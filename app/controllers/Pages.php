<?php
class Pages extends Controller {
	public function __construct() {

	}

	public function index() {
		if (isLoggedIn()) {
			redirect('posts');
		}

		// $data = [
		//   'title' => 'SharePosts',
		//   'description' => 'Simple social network built on the TraversyMVC PHP framework'
		// ];

		$this->view('posts/index');
	}

	public function about() {
		$data = [
			'title' => 'About Us',
			'description' => 'SharePosts is website for user to share their image based on their passion',
		];

		$this->view('pages/about', $data);
	}
}