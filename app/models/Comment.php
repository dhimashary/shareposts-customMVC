<?php
class Comment {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}
	public function addComment($data) {
		$this->db->query('INSERT INTO comments (user_id, post_id, content) VALUES(:user_id, :post_id, :content)');
		// Bind values

		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':post_id', $data['post_id']);
		$this->db->bind(':content', $data['content']);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
	public function getComment($id) {
		$this->db->query('SELECT comments.content,users.name,
						users.avatar,
                        comments.id as commentId,
                        comments.created_at as commentCreated
                        FROM comments
                        INNER JOIN users
                        ON comments.user_id = users.id
                        WHERE comments.post_id = :post_id
                        ORDER BY comments.created_at DESC
                        ');
		$this->db->bind(':post_id', $id);

		$results = $this->db->resultSet();

		return $results;
	}

}