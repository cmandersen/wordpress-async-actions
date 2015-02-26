# Wordpress Async Actions

To use this plugin, you install it the way you usually install a wordpress
plugin.

This plugin does not enable asynchronous actions just like that, but it
enables you to add "_async" to your action calls, and the action will be
called asynchonously.

Where you normally would write `do_action('some.action')`, you can now write `do_action('some.action_async')`, and the action will be carried out, without your user being bothered.
