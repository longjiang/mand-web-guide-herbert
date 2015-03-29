<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Mand Web Guide
 * Plugin URI:        http://mand.jon-long.ca
 * Description:       Creates a yahoo-link web directory with screenshots.
 * Version:           1.0.0
 * Author:            Author
 * Author URI:        http://www.jon-long.ca
 * License:           MIT
 */

require_once __DIR__ . '/vendor/autoload.php';

// Initialise framework
$plugin = new Herbert\Framework\Plugin();

if ($plugin->config['eloquent'])
{
    $plugin->database->eloquent();
}

if (!get_option('permalink_structure'))
{
    $plugin->message->error($plugin->name . ': Please ensure you have permalinks enabled.');
}
