<?php

class Contact {

	protected $contact_id, $contact_name, $contact_prenom, $contact_email, $contact_msg, $date_msg;

	// Déclaration de l'attribut statique $error
	protected static $error;

	// Déclaration des messages d'erreurs dans des constantes
	const MSG_ERROR_ID = 'ID doit être un entier.';
	const MSG_ERROR_NAME = 'Le nom doit être une chaîne de caractères.';
	const MSG_ERROR_PRENOM = 'Le prénom doit être une chaîne de caractères.';
	const MSG_ERROR_EMAIL = 'L\'email doit contenir un @.';
	const MSG_ERROR_MSG = 'Le message doit être une chaîne de caractères.';
	const MSG_ERROR_DATE = 'La date du message doit être au format d\'une date';
	const MSG_ERROR_END = 'L\'objet ne peut pas être créé.';

	public function __construct(array $data) {
		$this->setContact_id($data['contact_id']);
		$this->setContact_name($data['contact_name']);
		$this->setContact_prenom($data['contact_prenom']);
		$this->setContact_email($data['contact_email']);
		$this->setContact_msg($data['contact_msg']);
		$this->setDate_msg($data['date_msg']);
		// Utilisation du self:: pour accéder à error
		if(!empty(self::$error)) {
			throw new Exception(self::$error . self::MSG_ERROR_END);
		}
	}

	// gestion des erreurs
	public function setError($msg) {
		self::$error = $msg;
	}
	
	public function getError() {
		return self::$error;
	}

	// Setters
	public function setContact_id($contact_id) {
		if(is_int($contact_id)) {
			$this->contact_id = $contact_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_ID);
		}
	}

	public function setContact_name($contact_name) {
		if(is_string($contact_name)) {
			$this->contact_name = $contact_name;
		} else {
			$this->setError(self::MSG_ERROR_NAME);
		}
	}

	public function setContact_prenom($contact_prenom) {
		if(is_string($contact_prenom)) {
			$this->contact_prenom = $contact_prenom;
		} else {
			$this->setError(self::MSG_ERROR_PRENOM);
		}
	}

	public function setContact_email($contact_email) {
		if(is_string($contact_email)) {
			$this->contact_email = $contact_email;
		} else {
			$this->setError(self::MSG_ERROR_EMAIL);
		}
	}

	public function setContact_msg($contact_msg) {
		if(is_string($contact_msg)) {
			$this->contact_msg = $contact_msg;
		} else {
			$this->setError(self::MSG_ERROR_MSG);
		}
	}

	public function setDate_msg($date_msg) {
		list($y, $m, $d ) = explode('-', $date_msg);
		if (checkdate($m,$d,$y)) {
			$this->date_msg = $date_msg;
		} else {
			$this->setError(self::MSG_ERROR_DATE);
		}
	}

	// Getters
	public function getContact_id() {
		return $this->contact_id;
	}

	public function getContact_name() {
		return $this->contact_name;
	}

	public function getContact_prenom() {
		return $this->contact_prenom;
	}

	public function getContact_email() {
		return $this->contact_email;
	}

	public function getContact_msg() {
		return $this->contact_msg;
	}

	public function getDate_msg() {
		return $this->date_msg;
	}
}