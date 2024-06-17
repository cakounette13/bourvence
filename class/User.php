<?php

class User {
	protected $user_id, $user_login, $user_mdp, $role_id;

	// Déclaration de l'attribut statique $error
	protected static $error;

	// Déclaration des messages d'erreurs dans des constantes
	const MSG_ERROR_ID = 'ID doit être un entier.';
	const MSG_ERROR_LOGIN = 'Le login doit être une chaîne de caractères.';
	const MSG_ERROR_PRENOM = 'Le prénom doit être une chaîne de caractères.';
	const MSG_ERROR_MDP = 'Le mot de passe doit être une chaîne de caractères.';
	const MSG_ERROR_END = 'L\'objet ne peut pas être créé.';

	public function __construct(array $data) {
		$this->setUser_id($data['user_id']);
		$this->setUser_login($data['user_login']);
		$this->setUser_mdp($data['user_mdp']);
		$this->setRole_id($data['role_id']);
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
	public function setUser_id($user_id) {
		if(is_int($user_id)) {
			$this->user_id = $user_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_ID);
		}
	}

	public function setUser_login($user_login) {
		if(is_string($user_login)) {
			$this->user_login = $user_login;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_LOGIN);
		}
	}

	public function setuser_mdp($user_mdp) {
		if(is_string($user_mdp)) {
			$this->user_mdp = $user_mdp;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_MDP);
		}
	}

	public function setRole_id($role_id) {
		if(is_string($role_id)) {
			$this->role_id = $role_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_ID);
		}
	}

	// Getters
	public function getUser_id() {
		return $this->user_id;
	}

	public function getUser_login() {
		return $this->user_login;
	}

	public function getRole_id() {
		return $this->role_id;
	}
}