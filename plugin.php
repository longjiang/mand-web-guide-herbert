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
 * Plugin Type:       Piklist
 */

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/jl.php';

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

add_filter('piklist_post_types', 'add_website_post_type');

function add_website_post_type($post_types) {
	$post_types['website'] = array(
		'labels' => piklist('post_type_labels', 'Websites')
		,'public' => true
		,'rewrite' => array(
			'slug' => 'website'
		)
		,'edit_columns' => array(
		 'title' => __('Site title'),
	 )
		,'supports' => array(
			'author'
			,'revisions'
			,'title'
			,'thumbnail'
			,'comments'
			,'commentstatus'
			,'excerpt'
			,'page-attributes'
		)
		,'menu_icon' => 'dashicons-admin-site'
		,'title' => __('Site title')
		,'hide_meta_box' => array(
			'slug'
			,'author'
			,'revisions'
		)
	);

	return $post_types;
}

add_filter('piklist_taxonomies', 'add_website_category_taxonomy');

 function add_website_category_taxonomy($taxonomies) {
	 $taxonomies[] = array(
			'post_type' => 'website'
			,'name' => 'website_category'
			,'configuration' => array(
				'hierarchical' => true
				,'labels' => piklist('taxonomy_labels', 'Website Category')
				,'show_ui' => true
				,'query_var' => true
				,'rewrite' => array( 
					'slug' => 'website-category' 
				)
				,'show_admin_column' => true
			)
		);
return $taxonomies;
}