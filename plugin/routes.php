<?php
$plugin->route->get( [
	'as'   => 'index',
	'uri'  => '/webguide',
	], 'WebGuideController@index');