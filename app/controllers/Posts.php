<?php
class Posts extends Controller {
	public function __construct() {
		$this->postModel = $this->model('Post');
		$this->userModel = $this->model('User');
		$this->commentModel = $this->model('Comment');
	}

	public function index() {

		$posts = $this->postModel->getPosts();
		if (isLoggedIn()) {
			$id = $_SESSION['user_id'];
			$user = $this->userModel->getUserById($id);
			$data = [
				'posts' => $posts,
				'user' => $user,
			];
		} else {
			$data = [
				'posts' => $posts,
			];
		}

		$this->view('posts/index', $data);
	}

	public function section($section) {
		// Get posts
		$posts = $this->postModel->getPostsBySection($section);

		$data = [
			'posts' => $posts,
		];
		//die($data);
		$this->view('posts/section', $data);
	}

	public function add() {
		if (!isLoggedIn()) {
			redirect('users/login');
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize POST array
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			//Set up for upload folder , and checking name if already exists
			$img = $this->setImage();

			$data = [
				'title' => trim($_POST['title']),
				'body' => trim($_POST['body']),
				'user_id' => $_SESSION['user_id'],
				'title_err' => '',
				'body_err' => '',
				'img_name' => $img['name'],
				'img_err' => '',
				'section' => trim($_POST['section']),
			];
			//checking image fake or not
			if ($img['check'] !== false) {
				//it is an image
			} else {
				$data['img_err'] = 'Please upload an image only jpg or png files';
			}

			// Check file size
			if ($img['size'] > 300000) {
				$data['img_err'] = 'Your file size is too large, max size upload is 200kb';
			}

			// Allow certain file formats
			if ($img['fileType'] != "jpg" && $img['fileType'] != "png" && $img['fileType'] != "jpeg"
				&& $img['fileType'] != "gif") {
				$data['img_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}

			// Validate data
			if (empty($data['title'])) {
				$data['title_err'] = 'Please enter title';
			}

			if (empty($data['body'])) {
				$data['body_err'] = 'Please enter body text';
			}

			// Make sure no errors
			if (empty($data['title_err']) && empty($data['body_err']) && empty($data['img_err'])) {
				//moving image to the designated folder
				move_uploaded_file($img['tmp_name'], $img['target_file']);
				// Validated
				if ($this->postModel->addPost($data)) {
					flash('post_message', 'Post Added');
					redirect('posts');
				} else {
					die('Something went wrong');
				}
			} else {
				// Load view with errors
				$this->view('posts', $data);
			}

		} else {
			$data = [
				'title' => '',
				'body' => '',
			];

			$this->view('posts', $data);
		}
	}

	public function addComment() {

		if (!isLoggedIn()) {
			redirect('users/login');
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize POST array
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$user = $this->userModel->getUserById($_SESSION['user_id']);

			$data = [
				'user_id' => $_SESSION['user_id'],
				'avatar' => $user->avatar,
				'name' => $user->name,
				'content' => trim($_POST['content']),
				'post_id' => trim($_POST['post_id']),
			];

			if ($this->commentModel->addComment($data)) {
				// $user = $this->userModel->getUserById($data['user_id']);
				// // $comment = [
				// // 	'content' => $data['content'],
				// // ];
				$this->view('posts/comment', $data);
				//var_dump($comment['content']);
				//return $this->view('posts/comment', $comment);

			} else {
				die('Something went wrong');
			}
		}
	}

	public function edit($id) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize POST array
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				'id' => $id,
				'title' => trim($_POST['title']),
				'body' => trim($_POST['body']),
				'user_id' => $_SESSION['user_id'],
				'title_err' => '',
				'body_err' => '',
			];

			// Validate data
			if (empty($data['title'])) {
				$data['title_err'] = 'Please enter title';
			}
			if (empty($data['body'])) {
				$data['body_err'] = 'Please enter body text';
			}

			// Make sure no errors
			if (empty($data['title_err']) && empty($data['body_err'])) {
				// Validated
				if ($this->postModel->updatePost($data)) {
					flash('post_message', 'Post Updated');
					redirect('posts');
				} else {
					die('Something went wrong');
				}
			} else {
				// Load view with errors
				$this->view('posts/edit', $data);
			}

		} else {
			// Get existing post from model
			$post = $this->postModel->getPostById($id);

			// Check for owner
			if ($post->user_id != $_SESSION['user_id']) {
				redirect('posts');
			}

			$data = [
				'id' => $id,
				'title' => $post->title,
				'body' => $post->body,
			];

			$this->view('posts/edit', $data);
		}
	}

	public function show($id) {
		if (isLoggedIn()) {
			$curId = $_SESSION['user_id'];
			$currentUser = $this->userModel->getUserById($curId);
			$post = $this->postModel->getPostById($id);
			$comments = $this->commentModel->getComment($id);
			//this one is user that posted the thread
			$user = $this->userModel->getUserById($post->user_id);
			$data = [
				'currentUser' => $currentUser,
				'post' => $post,
				'user' => $user,
				'comments' => $comments,
			];

			//$commentAvatar = $this->userModel->getUserById($data['comments']->user_id);
			//$data['commenetAvatar'] = $commentAvatar;
		} else {
			$post = $this->postModel->getPostById($id);
			$comments = $this->commentModel->getComment($id);
			$user = $this->userModel->getUserById($post->user_id);

			$data = [
				'post' => $post,
				'user' => $user,
				'comments' => $comments,
			];
		}

		$this->view('posts/show', $data);
	}

	public function delete($id) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Get existing post from model
			$post = $this->postModel->getPostById($id);

			// Check for owner
			if ($post->user_id != $_SESSION['user_id']) {
				redirect('posts');
			}

			if ($this->postModel->deletePost($id)) {
				flash('post_message', 'Post Removed');
				redirect('posts');
			} else {
				die('Something went wrong');
			}
		} else {
			redirect('posts');
		}
	}
}