<?php
/*
 * Base Controller
 * Loads the models and views
 */
class Controller {
	// Load model
	public function model($model) {
		// Require model file
		require_once '../app/models/' . $model . '.php';

		// Instatiate model
		return new $model();
	}

	// Load view
	public function view($view, $data = []) {
		// Check for view file
		if (file_exists('../app/views/' . $view . '.php')) {
			require_once '../app/views/' . $view . '.php';
		} else {
			// View does not exist
			die('View does not exist');
		}
	}
	//just lib to clean some string
	public function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	//just lib to set image since both posts and register user can add image thumbnail / post
	public function setImage() {
		$target_dir = UPROOT;
		$target_name = basename($_FILES['image']['name']);
		$tmp_name = $_FILES['image']['tmp_name'];
		$target_file = UPROOT . "\\public" . "\\img\\" . $target_name;
		//just in case file already exist ill append time and date
		$timeStamp = date("Y-m-d_H:i:s");
		//checking if file with the same name already exists
		$append = $this->clean($timeStamp);
		if (file_exists($target_file)) {
			//renaming the new file by exploding it
			$fileName = explode('.', $target_name);
			$target_name = $fileName[0] . '.' . $append . '.' . $fileName[1];
			//reassign the folder path
			$target_file = UPROOT . "\\public" . "\\img\\" . $target_name;

		}
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$check = getimagesize($tmp_name);
		$size = $_FILES["image"]["size"];
		$img = [
			'name' => $target_name,
			'fileType' => $imageFileType,
			'tmp_name' => $tmp_name,
			'target_file' => $target_file,
			'check' => $check,
			'size' => $size,
		];
		return $img;
	}
}