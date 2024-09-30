<?php

class product {
	protected $prod_id, $prod_name, $prod_desc, $prod_img, $family_id, $appell_id, $region_id, $frs_id, $color_id, $cont_id;

	// Déclaration de l'attribut statique $error
	protected static $error;

	// Déclaration des messages d'erreurs dans des constantes
	const MSG_ERROR_ID = 'ID doit être un entier.';
	const MSG_ERROR_NAME = 'La dénomination doit être une chaîne de caractères.';
	const MSG_ERROR_DESC = 'La description doit être une chaîne de caractères.';
	const MSG_ERROR_IMG = 'L\'image doit être au format png ou jpeg.';
	const MSG_ERROR_FAMILY = 'La famille doit être choisie dans la liste.';
	const MSG_ERROR_APPELL = 'L\'appellation doit être choisie dans la liste.';
	const MSG_ERROR_REGION = 'La région doit être choisie dans la liste.';
	const MSG_ERROR_FRS = 'Le fournisseur doit être choisi dans la liste.';
	const MSG_ERROR_COLOR = 'La couleur doit être choisie dans la liste.';
	const MSG_ERROR_CONT = 'La contenance doit être choisie dans la liste.';
	const MSG_ERROR_END = 'L\'objet ne peut pas être créé.';

	// Constructeur créant un produit
	public function __construct(array $data) {
		if(isset($data['prod_id'])) {
			$this->setProd_id($data['prod_id']);
		}
		$this->setProd_name($data['prod_name']);
		$this->setProd_desc($data['prod_desc']);
		$this->setProd_img($data['prod_img']);
		$this->setfamily_id($data['family_id']);
		$this->setAppell_id($data['appell_id']);
		$this->setRegion_id($data['region_id']);
		$this->setFrs_id($data['frs_id']);
		$this->setcolor_Id($data['color_id']);
		$this->setCont_id($data['cont_id']);
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
	public function setProd_id($prod_id) {
		if(is_int($prod_id)) {
			$this->prod_id = $prod_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_ID);
		}	
	}

	public function setProd_name($prod_name) {
		if(is_string($prod_name)) {
			$this->prod_name = $prod_name;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_NAME);
		}	
	}

	public function setProd_desc($prod_desc) {
		if(is_string($prod_desc)) {
			$this->prod_desc = $prod_desc;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_DESC);
		}	
	}

	public function setProd_img($prod_img) {
		if(is_string($prod_img)) {
			$this->prod_img = $prod_img;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_IMG);
		}	
	}
	
	public function setFamily_id($family_id) {
		if(is_int($family_id)) {
			$this->family_id = $family_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_FAMILY);
		}	
	}

	public function setAppell_id($appell_id) {
		if(is_int($appell_id)) {
			$this->appell_id = $appell_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_APPELL);
		}	
	}

	public function setRegion_id($region_id) {
		if(is_int($region_id)) {
			$this->region_id = $region_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_REGION);
		}	
	}

	public function setFrs_id($frs_id) {
		if(is_int($frs_id)) {
			$this->frs_id = $frs_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_FRS);
		}	
	}

	public function setColor_id($color_id) {
		if(is_int($color_id)) {
			$this->color_id = $color_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_COLOR);
		}	
	}

	public function setCont_id($cont_id) {
		if(is_int($cont_id)) {
			$this->cont_id = $cont_id;
		} else {
			// appel de setError si la valeur attendue n'est pas conforme
			$this->setError(self::MSG_ERROR_CONT);
		}	
	}

	// Getters
	public function getProd_id() {
		return $this->prod_id;
	}

	public function getProd_name() {
		return $this->prod_name;
	}

	public function getProd_desc() {
		return $this->prod_desc;
	}

	public function getProd_img() {
		return $this->prod_img;
	}

	public function getFamily_id() {
		return $this->family_id;
	}

	public function getAppell_id() {
		return $this->appell_id;
	}

	public function getRegion_id() {
		return $this->region_id;
	}

	public function getFrs_id() {
		return $this->frs_id;
	}

	public function getColor_id() {
		return $this->color_id;
	}

	public function getCont_id() {
		return $this->cont_id;
	}
}