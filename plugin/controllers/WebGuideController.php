<?php




class WebGuideController extends BaseController {

	/**
	* Show the index of the web guide.
	*/
	public function index()
	{


		// I will first get all the categories

		function get_top_website_categories() {
			return get_categories(array(
				'taxonomy' => 'website_category',
			));
		}

		$categories = get_top_website_categories();


		// And for each cateogry I will display it with a view

		$html_to_return = '';
		foreach ( $categories as $category ) {
			$website_posts =
				jl\get_posts_from_category( 2, 'website', 'website_category' );
			
			// jl\d($website_posts);

			$websites_in_category = jl\map($website_posts, function($website_post) {
				$website = new stdClass();
				$website->title = $website_post->post_title;
				$website->description = $website_post->post_excerpt;
				$website->url = get_post_meta($website_post->ID, 'url', true);
				$website->thumbnail = jl\get_post_thumbnail_url( $website_post->ID );
				return $website;
			});

			$html_to_return .= $this->view->render( 'category-teaser', [
				'category_title' => $category->name,
				'category_id' => $category->term_id,
				'websites' => $websites_in_category,
				] );
		}

		// I for each category I will list all the websites

		return $html_to_return;



		// If there are sub categories I will loop over any subcategories

		// And then list all the websites under there
	}
}