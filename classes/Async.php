<?php namespace CMAndersen;

/**
 * Class Async
 * @package CMAndersen
 */
class Async {
    protected $async_postfix = "_async";

    /**
     * Run an action asynchronously
     */
    public function do_action() {
        $current_action = current_action();
        // Only run this if the running action ends with our postfix
        if($this->is_async($current_action)) {
            $action = $this->clean_action($current_action);
            $arguments = func_get_args();
            // This first argument in the "all" action, is the intended action. Remove it.
            if(isset($arguments[0]) && $arguments[0] == $current_action) {
                array_shift($arguments);
            }
            // Schedule the action to be run now, effectively running it in a new thread
            wp_schedule_single_event(time(), $action, $arguments);
        }
    }

    /**
     * Determines if the given action is intended to run asynchronously
     *
     * @param $action
     * @return bool
     */
    protected function is_async($action) {
        return $this->async_postfix === substr($action, -strlen($this->async_postfix));
    }

    /**
     * Remove the async postfix from the action
     *
     * @param $action
     * @return mixed
     */
    protected function clean_action($action) {
        return str_replace($this->async_postfix, '', $action);
    }
}