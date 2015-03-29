<?php

if (!defined('HERBERT_CONFIG'))
    die();

return [
    'framework' => 'framework', /** You will need to update the composer.json file if you change this value **/
    'plugin'    => 'plugin', /** You will need to update the composer.json file if you change this value **/
    'views'     => 'views',
    'assets'    => 'assets',
    'core'      => 'plugin.php',
    'api'       => 'mandWebGuideApi',
    'name'      => 'Mand Web Guide',
    'eloquent'  => true
];
