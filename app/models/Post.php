<?php
class Post {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getPosts() {
		$this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC

                        ');

		$results = $this->db->resultSet();
		return $results;
	}

	public function addPost($data) {
		$this->db->query('INSERT INTO posts (title, user_id, body, images, section) VALUES(:title, :user_id, :body, :images, :section)');
		// Bind values
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':body', $data['body']);
		$this->db->bind(':images', $data['img_name']);
		$this->db->bind(':section', $data['section']);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function updatePost($data) {
		$this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
		// Bind values
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':body', $data['body']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getPostById($id) {
		$this->db->query('SELECT * FROM posts WHERE id = :id');
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row;
	}

	public function getPostsByAccount($name) {
		$this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        users.name as username,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        WHERE users.name = :name
                        ORDER BY posts.created_at DESC');

		$this->db->bind(':name', $name);

		$row = $this->db->resultSet();

		return $row;
	}

	public function getPostsBySection($section) {
		$this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        WHERE section = :section
                        ORDER BY posts.created_at DESC');

		$this->db->bind(':section', $section);

		$rows = $this->db->resultSet();

		return $rows;
	}

	// public function countImages($img) {
	// 	$this->db->query('SELECT COUNT(:img) FROM posts WHERE images = :img');
	// 	$this->db->bind(':img', $img);

	// 	$num = $this->db->execute();
	// 	return $num;
	// }

	public function deletePost($id) {
		$this->db->query('DELETE FROM posts WHERE id = :id');
		// Bind values
		$this->db->bind(':id', $id);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
}