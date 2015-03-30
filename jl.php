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

function d($string) {
	predump($string);
}

function map($collection, $callback) {
	$mapped = [];
	foreach($collection as $item) {
		array_push($mapped, call_user_func($callback, $item));
	}
	return $mapped;
}

/**
 * WordPress specific functions
 */

function get_posts_from_category($term_id, $post_type = 'post', $taxonomy = 'category' ) {
	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'id',
				'terms'    => $term_id, 	
			)
		)
	);
	return get_posts( $args );
}

function get_post_thumbnail_url($post_id, $size = 'medium') {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
}

function get_top_categories( $taxonomy ) {
	return get_categories(array(
		'taxonomy' => 'website_category',
		'parent'   => '0',
	));
}

function get_subcategories( $category, $taxonomy = 'category' ) {
	$result = get_categories(array(
			'taxonomy' => $taxonomy,
			'parent' =>   $category->term_id,
		));
	if ( is_array($result) ) {
		$subcategories = $result;
		return $result;
	} elseif (is_object($result) ) {
		if ($result->term_id == $category->term_id) {
			return false;
		} else {
			return [ $result ];
		}
	} else {
		return false;
	}
}

use \jl;