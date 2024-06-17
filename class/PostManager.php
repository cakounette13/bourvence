<?php

class PostManager {

	private $_db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function setDb(PDO $dbh) {
		$this->_db = $dbh;
	}

	// On récupère tous les post ou un seul avec son id
	public function getPost($post_id ="") {
		if(empty($post_id)) {
			$sql = "SELECT * FROM posts P INNER JOIN users U ON (P.user_id = U.user_id)";
			$stmt = $this->_db->prepare($sql);
		} else {
			$sql = "SELECT * FROM posts P INNER JOIN users U ON (P.user_id = U.user_id) WHERE post_id = :post_id ";
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(":post_id", $post_id);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		if(isset($result)) {
			return $result;
		} else {
			$_SESSION['error'] = "Pas de post enregistré pour le moment";
			return $result = (array) Null;
		}
	}

	public function insertPost(Post $post) {
		$sql = "INSERT INTO posts (post_id, post_title, post_text, post_img, post_publie, post_date, user_id) VALUES (:post_id, :post_title, :post_text, :post_img, :post_publie, :post_date, :user_id)";
		$stmt = $this->_db->prepare($sql);
		$post_id = (int) trim(htmlspecialchars($post->getPost_id()));
		$post_title = trim(htmlspecialchars($post->getPost_title()));
		$post_text = trim(htmlspecialchars($post->getPost_text()));
		$post_img = trim(htmlspecialchars($post->getPost_img()));
		$post_publie = (int) trim(htmlspecialchars($post->getPost_publie()));
		$post_date = trim(htmlspecialchars($post->getPost_date()));
		$user_id = (int) trim(htmlspecialchars($post->getUser_id()));
		$stmt->bindparam(':post_id', $post_id);
		$stmt->bindparam(':post_title', $post_title);
		$stmt->bindparam(':post_text', $post_text);
		$stmt->bindparam(':post_img', $post_img);
		$stmt->bindparam(':post_publie', $post_publie, PDO::PARAM_INT);
		$stmt->bindparam(':post_date', $post_date);
		$stmt->bindparam(':user_id', $user_id);
		$stmt->execute();
	}

	// Mise à jour d'un post
	public function updatePost(Post $post) {
		$sql = "UPDATE posts SET post_title = :post_title, post_text = :post_text, post_img = :post_img, post_publie = :post_publie, post_date = :post_date, user_id = :user_id WHERE post_id = :post_id";
		$stmt = $this->_db->prepare($sql);
		$post_id = (int) trim(htmlspecialchars($post->getPost_id()));
		$post_title = trim(htmlspecialchars($post->getPost_title()));
		$post_text = trim(htmlspecialchars($post->getPost_text()));
		$post_img = trim(htmlspecialchars($post->getPost_img()));
		$post_publie = (int) trim(htmlspecialchars($post->getPost_publie()));
		$post_date = trim(htmlspecialchars($post->getPost_date()));
		$user_id = (int) trim(htmlspecialchars($post->getUser_id()));
		$stmt->bindparam(':post_id', $post_id);
		$stmt->bindparam(':post_title', $post_title);
		$stmt->bindparam(':post_text', $post_text);
		$stmt->bindparam(':post_img', $post_img);
		$stmt->bindparam(':post_publie', $post_publie, PDO::PARAM_INT);
		$stmt->bindparam(':post_date', $post_date);
		$stmt->bindparam(':user_id', $user_id);
		$stmt->execute();
	}
	
	// Suppression d'un post
	public function deletePost($post_id, $post_img) {
		$sql = "DELETE FROM posts WHERE post_id = :post_id";
		$stmt = $this->_db->prepare($sql);
		$file = IMAGE_DIR_PATH . "/posts/" . $post_img;
		if(file_exists($file)) {
			unlink($file);
		}
		$stmt->bindparam(':post_id',$post_id);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	
	public function uploadImgPost($file) {
		$upload_dir = IMAGE_DIR_PATH . "/posts/";
		$error = 0;
		if($error == UPLOAD_ERR_OK) {
			$temp_name = $_FILES['new_img']['tmp_name'];
			$name = basename($_FILES['new_img']['name']);
			$type = $_FILES['new_img']['type'];
			$size = $_FILES['new_img']['size'];
			// vérification du format de l'image
			if($type === 'image/jpeg' OR $type === 'image/png') {
				// Taille de l'image inférieure à 1méga octet
				if($size <= 1000000) {
					// Vérification si chargement n'a pas réussi
					if(move_uploaded_file($temp_name, $upload_dir.$name) == FALSE) {
						$error++;
					}
				} else {
					$error++;
				}					
			} else {
				$error++;
			}
		}
		if($error == 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}