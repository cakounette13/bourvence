<?php

class Post {
	protected $post_id, $post_title, $post_text, $post_img, $post_publie, $post_date, $user_id;

	// Déclaration de l'attribut statique $error
	protected static $error;

	// Déclaration des messages d'erreurs dans des constantes
	const MSG_ERROR_ID = 'ID doit être un entier.';
	const MSG_ERROR_TITLE = 'Le titre doit être une chaîne de caractères.';
	const MSG_ERROR_TEXT = 'Le texte doit être une chaîne de caractères.';
	const MSG_ERROR_IMG = 'L\'image doit être au format png ou jpeg.';
	const MSG_ERROR_PUBLIE = 'Le statut publié doit être au format booléen.';
	const MSG_ERROR_DATE = 'La date du message doit être au format d\'une date';
	const MSG_ERROR_USER = 'L\'utilisateur doit être un entier.';

	public function __construct(array $data) {
		if(isset($data['post_id'])) {
			$this->setPost_id($data['post_id']);
		}
		$this->setPost_title($data['post_title']);
		$this->setPost_text($data['post_text']);
		$this->setPost_img($data['post_img']);
		$this->setPost_publie($data['post_publie']);
		$this->setPost_date($data['post_date']);
		$this->setUser_id($data['user_id']);
	}

	// gestion des erreurs
	public function setError($msg) {
		self::$error = $msg;
	}
	
	public function getError() {
		return self::$error;
	}

	// Setters
	public function setPost_id($post_id) {
		if(is_int($post_id)) {
			$this->post_id = $post_id;
		} else {
			$this->setError(self::MSG_ERROR_ID);
		}
	}

	public function setPost_title($post_title) {
		if(is_string($post_title)) {
			$this->post_title = $post_title;
		} else {
			$this->setError(self::MSG_ERROR_TITLE);
		}
	}

	public function setPost_text($post_text) {
		if(is_string($post_text)) {
			$this->post_text = $post_text;
		} else {
			$this->setError(self::MSG_ERROR_TEXT);
		}
	}

	public function setPost_img($post_img) {
		if(is_string($post_img)) {
			$this->post_img = $post_img;
		} else {
			$this->setError(self::MSG_ERROR_IMG);
		}
	}
	
	public function setPost_publie($post_publie) {
		if(is_int($post_publie)) {
			$this->post_publie = $post_publie;
		} else {
			$this->setError(self::MSG_ERROR_PUBLIE);
		}
	}

	public function setPost_date($post_date) {
		list($y, $m, $d ) = explode('-', $post_date);
		if (checkdate($m,$d,$y)) {
			$this->post_date = $post_date;
		} else {
			$this->setError(self::MSG_ERROR_DATE);
		}
	}

	public function setUser_id($user_id) {
		if(is_int($user_id)) {
			$this->user_id = $user_id;
		} else {
			$this->setError(self::MSG_ERROR_USER);
		}
	}

	// Getters
	public function getPost_id() {
		return $this->post_id;
	}

	public function getPost_title() {
		return $this->post_title;
	}

	public function getPost_text() {
		return $this->post_text;
	}

	public function getPost_img() {
		return $this->post_img;
	}

	public function getPost_publie() {
		return $this->post_publie;
	}

	public function getPost_date() {
		return $this->post_date;
	}
	
	public function getUser_id() {
		return $this->user_id;
	}
}