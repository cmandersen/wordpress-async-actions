<?php
/*
 * Plugin Name: Async Actions
 * Description: Run actions asynchronously by adding "_async" to the do_action call
 * Version: 1.0.0
 * Author: Christian Morgan Andersen
 * Author URI: http://cmandersen.net
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once __DIR__ . "/classes/Async.php";
// Hook into the "all" action, called on every do_action
add_action('all', array(new CMAndersen\Async(), 'do_action'), 1);