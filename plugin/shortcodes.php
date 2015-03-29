<?php

function mand_web_guide_index_shortcode() {
	global $mandWebGuideApi;
	return $mandWebGuideApi->index();
}

$shortcode_name = 'mand_web_guide_index';

$shortcode_function_name = 'mand_web_guide_index_shortcode';

add_shortcode( $shortcode_name, $shortcode_function_name );