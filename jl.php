<?php
/**
 * A set of utilties function I use. -Jon Long
 */
namespace jl;

function predump($string) {
	?><pre><?php
		var_dump($string);
	?></pre><?php
}

use \jl;