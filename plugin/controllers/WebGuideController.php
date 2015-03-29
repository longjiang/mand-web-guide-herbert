<?php

class WebGuideController extends BaseController {

	/**
	* Show the index of the web guide.
	*/
	public function index()
	{
		// I will first get all the categories
		// And for each cateogry I will display it with a

		// and pass it to a view partial.

		// I will loop over the top web site categories

		function get_top_website_categories() {
			jl\predump(get_categories(array(
				'taxonomy' => 'website_category',
			)));
		}

		get_top_website_categories();

		// I for each category I will list all the websites

		// If there are sub categories I will loop over any subcategories

		// And then list all the websites under there
		$categories = [];
		return $this->view->render( 'index', ['categories' => $categories] );
	}
}