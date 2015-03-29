<?php

class Api extends BaseController {
	/**
	* Show the index of the web guide.
	*/
	public function index()
	{

		echo $this->controller->fetch('WebGuideController@index');
	}
}

$apiName = $plugin->config['api'];
global $$apiName;
$$apiName = new Api($plugin);
$plugin->api = $$apiName;

