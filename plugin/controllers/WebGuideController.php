<?php




class WebGuideController extends BaseController {

	/**
	* Show the index of the web guide.
	*/
	public function index()
	{
		// I will first get all the categories

		$website_categories = jl\get_top_categories( 'website_category' );

		return $this->show_websites_in_categories($website_categories);

	}

	public static function simplify_website_posts($website_posts) {
		$websites = jl\map($website_posts, function($website_post) {
			$website = new stdClass();
			$website->title = $website_post->post_title;
			$website->description = $website_post->post_excerpt;
			$website->url = get_post_meta( $website_post->ID, 'url', true );
			$website->thumbnail = jl\get_post_thumbnail_url( $website_post->ID );
			return $website;
		});
		return $websites;
	}

	public static function get_websites_by_category($website_category) {

		// jl\d($website_category);

		$website_posts = jl\get_posts_from_category(
			$website_category->term_id, 'website', 'website_category' );

		$websites = self::simplify_website_posts($website_posts);

		return $websites;
	}

	public function show_websites_in_categories($website_categories) {

		// For each category I will use a view to list all the websites
		
		$html_to_return = '';

		foreach ($website_categories as $website_category) {
			$websites_in_category = self::get_websites_by_category($website_category);

			$html_to_return .= $this->view->render( 'category-teaser', [
				'category_title' => $website_category->name,
				'category_id' => $website_category->term_id,
				'websites' => $websites_in_category,
				] );

			// If there are sub categories I will loop over any subcategories

			if ( $subcategories = jl\get_subcategories( $website_category, 'website_category' ) ) {
				$html_to_return .= $this->show_websites_in_categories( $subcategories );
			}
		}

		return $html_to_return;

		// And then list all the websites under there
		
	}
}