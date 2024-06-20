<?php

class ProductManager {
	private $_db;
	// Nbr de produits par page
	protected const PAR_PAGE = 20;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function setDb(PDO $dbh) {
		$this->_db = $dbh;
	}

	public function getProduct($prod_id = '') {
		// Sélection de tous les produits
		if(empty($prod_id)) {
			$sql = "SELECT * FROM products ORDER BY prod_id ASC";
			$stmt = $this->_db->prepare($sql);
		} elseif (is_int($prod_id)) {
			// Sélection d'un seul produit
			$sql = 'SELECT * FROM products P WHERE prod_id = :prod_id ORDER BY prod_id ASC';
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':prod_id', $prod_id, PDO::PARAM_INT);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// fonction pour créer un nouveau produit
	public function insertProduct(Product $product) {
		$sql = "INSERT INTO products (prod_id, prod_name, prod_desc, prod_prix_ttc, prod_img, family_id, appell_id, region_id, frs_id, color_id, cont_id) VALUES (:prod_id, :prod_name, :prod_desc, :prod_prix_ttc, :prod_img, :family_id, :appell_id, :region_id, :frs_id, :color_id, :cont_id)";
		$stmt = $this->_db->prepare($sql);
		$prod_id = (int) trim(htmlspecialchars($product->getProd_id()));
		$prod_name = trim(htmlspecialchars($product->getProd_name()));
		$prod_desc = trim(htmlspecialchars($product->getProd_desc()));
		$prod_prix_ttc = trim(htmlspecialchars($product->getProd_prix_ttc()));
		$prod_img = trim(htmlspecialchars($product->getProd_img()));
		$family_id = (int) trim(htmlspecialchars($product->getFamily_id()));
		$appell_id = trim(htmlspecialchars($product->getAppell_id()));
		$region_id = (int) trim(htmlspecialchars($product->getRegion_id()));
		$frs_id = (int) trim(htmlspecialchars($product->getFrs_id()));
		$color_id = (int) trim(htmlspecialchars($product->getColor_id()));
		$cont_id = (int) trim(htmlspecialchars($product->getCont_id()));
		$stmt->bindparam(':prod_id', $prod_id);
		$stmt->bindparam(':prod_name', $prod_name);
		$stmt->bindparam(':prod_desc', $prod_desc);
		$stmt->bindparam(':prod_prix_ttc', $prod_prix_ttc);
		$stmt->bindparam(':prod_img', $prod_img);
		$stmt->bindparam(':family_id', $family_id);
		$stmt->bindparam(':appell_id', $appell_id);
		$stmt->bindparam(':region_id', $region_id);
		$stmt->bindparam(':frs_id', $frs_id);
		$stmt->bindparam(':color_id', $color_id);
		$stmt->bindparam(':cont_id', $cont_id);
		$stmt->execute();
	}

	// fonction de mise à jour d'un produit existant
	public function updateProduct(Product $product) {
		$sql = "UPDATE products SET prod_name = :prod_name, prod_desc = :prod_desc, prod_prix_ttc = :prod_prix_ttc, prod_img = :prod_img, family_id = :family_id, appell_id = :appell_id, region_id = :region_id, frs_id = :frs_id, color_id = :color_id, cont_id = :cont_id WHERE prod_id = :prod_id";
		$stmt = $this->_db->prepare($sql);
		$prod_id = (int) trim(htmlspecialchars($product->getProd_id()));
		$prod_name = htmlspecialchars($product->getProd_name());
		$prod_desc = htmlspecialchars($product->getProd_desc());
		$prod_prix_ttc = htmlspecialchars($product->getProd_prix_ttc());
		$prod_img = htmlspecialchars($product->getProd_img());
		$family_id = (int) trim(htmlspecialchars($product->getFamily_id()));
		$appell_id = (int) trim(htmlspecialchars($product->getAppell_id()));
		$region_id = (int) trim(htmlspecialchars($product->getRegion_id()));
		$frs_id = (int) trim(htmlspecialchars($product->getFrs_id()));
		$color_id =(int) trim(htmlspecialchars($product->getColor_id()));
		$cont_id = (int) trim(htmlspecialchars($product->getCont_id()));
		$stmt->bindparam(':prod_id', $prod_id);
		$stmt->bindparam(':prod_name', $prod_name);
		$stmt->bindparam(':prod_desc', $prod_desc);
		$stmt->bindparam(':prod_prix_ttc', $prod_prix_ttc);
		$stmt->bindparam(':prod_img', $prod_img);
		$stmt->bindparam(':family_id', $family_id);
		$stmt->bindparam(':appell_id', $appell_id);
		$stmt->bindparam(':region_id', $region_id);
		$stmt->bindparam(':frs_id', $frs_id);
		$stmt->bindparam(':color_id', $color_id);
		$stmt->bindparam(':cont_id', $cont_id);
		$stmt->execute();
	}

	// Suppression d'un produit
	public function deleteProduct($prod_id) {
		$sql = "DELETE FROM products WHERE prod_id = :prod_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':prod_id',$prod_id);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
	
	// Sélectionner la ou les familles
	public function getFamily($family_id = "") {
		if(empty($family_id)) {
			// sélection de toutes les families
			$sql = "SELECT family_id, family_name FROM families ORDER BY family_id ASC";
			$stmt = $this->_db->prepare($sql);
		} elseif (is_int($family_id)) {
			// sélectionner une seule famille
			$sql = 'SELECT P.family_id, family_name FROM families F WHERE P.family_id = F.family_id GROUP BY family_id ORDER BY family_name ASC';
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':family_id', $family_id);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les régions par famille de produits
	public function getRegion($family_id="") {
		// toutes les régions de toutes les familles
		if(empty($family_id)) {
			$sql = "SELECT P.prod_id, P.family_id, P.region_id, region_name FROM products P INNER JOIN regions R ON (P.region_id = R.region_id) GROUP BY region_id";
			$stmt = $this->_db->prepare($sql);
		} else {
			// Les régions d'une seule famille
			$sql = "SELECT P.prod_id, P.family_id, P.region_id, region_name, family_name FROM products P INNER JOIN regions R ON (P.region_id = R.region_id) INNER JOIN families F ON (P.family_id = F.family_id) WHERE P.family_id = :family_id GROUP BY region_id";
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':family_id', $family_id);
		}	
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les couleurs par famille
	public function getColorFamily($family_id="") {
		if(empty($family_id)) {
			$sql = "SELECT P.prod_id, P.family_id, P.color_id, color_name FROM products P INNER JOIN colors C ON (P.color_id = C.color_id) GROUP BY P.color_id";
			$stmt = $this->_db->prepare($sql);
		} else {
			$sql = "SELECT P.prod_id, P.family_id, P.color_id, color_name, family_name FROM products P INNER JOIN colors C ON (P.color_id = C.color_id) WHERE family_id = :family_id GROUP BY P.color_id";
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':family_id', $family_id);
		}	
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les couleurs
	public function getColor($prod_id="") {
		if(empty($prod_id)) {
			$sql = "SELECT color_id, color_name FROM colors";
			$stmt = $this->_db->prepare($sql);
		} else {
			$sql = "SELECT P.prod_id, P.color_id, color_name FROM products P INNER JOIN colors C ON (P.color_id = C.color_id) WHERE prod_id = :prod_id GROUP BY P.color_id";
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':prod_id', $prod_id);
		}	
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les appellations des produits
	public function getAppell($prod_id = "") {
		// Sélection de toutes les appellations
		if(empty($prod_id)) {
			$sql = "SELECT appell_id, appell_name FROM appellations";
			$stmt = $this->_db->prepare($sql);
		} elseif (is_int($prod_id)) {
			// Sélection de l'appellation d'un produit
			$sql = 'SELECT P.prod_id, P.appell_id, appell_name FROM products P INNER JOIN appellations A ON (P.appell_id = A.appell_id) WHERE prod_id = :prod_id';
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':prod_id', $prod_id);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les fournisseurs des produits
	public function getFrs($prod_id = "") {
		// Sélection de tous les fournisseurs
		if(empty($prod_id)) {
			$sql = "SELECT frs_id, frs_name FROM fournisseurs";
			$stmt = $this->_db->prepare($sql);
		} elseif (is_int($prod_id)) {
			// Sélection du fournisseur d'un produit
			$sql = 'SELECT P.prod_id, P.frs_id, frs_name FROM products P INNER JOIN fournisseurs F ON (P.frs_id = F.frs_id) WHERE prod_id = :prod_id GROUP BY P.frs_id';
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':prod_id', $prod_id);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner les contenants des produits
	public function getContenant($prod_id = "") {
		// Sélection de tous les contenants
		if(empty($prod_id)) {
			$sql = "SELECT cont_id, cont_name FROM contenants";
			$stmt = $this->_db->prepare($sql);
		} elseif (is_int($prod_id)) {
			// Sélection du contenant d'un produit
			$sql = 'SELECT P.prod_id, P.cont_id, cont_name FROM products P INNER JOIN contenants C ON (P.cont_id = C.cont_id) WHERE prod_id = :prod_id GROUP BY P.cont_id';
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':prod_id', $prod_id);
		}
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Calcule du nombre de produits
	public function getNbProduct() {
		$sql ="SELECT count(*) AS nb_prod FROM products";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	// Calcule le nbr de pages à afficher
	public function getPages() {
		// nbr de produits au total
		$nbr = $this->getNbproduct();
		$nbr = (int) $nbr['nb_prod'];
		// On calcule le nbr de pages totales arrondi à la page supérieure
		$pages = ceil($nbr / self::PAR_PAGE);
		return $pages;
	}

	// Calcule du nbr de produits par page
	public function getPageProduct($currentPage) {
		$parPage = self::PAR_PAGE;
		// Calcul du 1er article de la page
		$premier = ($currentPage * $parPage) - $parPage;
		// Sélection de tous les produits
		$sql = 'SELECT * FROM products ORDER BY prod_id LIMIT :premier, :parPage';
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':premier', $premier, PDO::PARAM_INT);
		$stmt->bindparam(':parPage', $parPage, PDO::PARAM_INT);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// pour la recherche
	public function getSearchProduct($search) {
		$sql = 'SELECT prod_id, prod_name, family_name, region_name, appell_name, frs_name FROM products P INNER JOIN families Fa ON (P.family_id = Fa.family_id) INNER JOIN regions R ON (P.region_id = R.region_id) INNER JOIN appellations A ON (P.appell_id = A.appell_id) INNER JOIN fournisseurs F ON (P.frs_id = F.frs_id) WHERE concat(prod_name, family_name, region_name, appell_name, frs_name) LIKE "%":search"%"';
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':search', $search, PDO::PARAM_STR);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if(empty($row)) {
				$result = "null";
			} else {
				$result[] = $row;
			}
		}
		return $result;
	}

	// Contrôle le téléchargement des images
	public function uploadImgProd($file) {
		$upload_dir = IMAGE_DIR_PATH . "/products/";
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

	// Sélectionner tous les produits d'une famille
	public function getProductFamily($family_id) {
		$sql = "SELECT * FROM products WHERE family_id = :family_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':family_id', $family_id);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélectionner toutes les régions de France
	public function getRegionFrance() {
		$sql = "SELECT * FROM products P INNER JOIN regions R ON (P.region_id = R.region_id) WHERE region_name IN ('Beaujolais', 'Bordelais', 'Bourgogne', 'Champagne', 'France', 'Languedoc', 'Loire', 'Provence', 'Rhône', 'Roussillon', 'Sud-Ouest') GROUP BY R.region_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélection de tous les produits d'une région
	public function getProductRegion($region_id) {
		$sql = "SELECT * FROM products WHERE region_id = :region_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':region_id', $region_id);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélection de tous les produits d'une couleur
	public function getProductColor($color_id) {
		$sql = "SELECT * FROM products WHERE color_id = :color_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':color_id', $color_id);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélection des regions des vins étrangers
	public function getRegionStranger() {
		$sql = "SELECT * FROM products P INNER JOIN regions R ON (P.region_id = R.region_id) WHERE region_name IN ('Afrique du Sud', 'Allemagne', 'Argentine', 'Australie', 'Chili', 'Espagne', 'Etats-Unis', 'Hongrie', 'Italie', 'Liban', 'Maroc', 'Nouvelle Zélande', 'Portugal') GROUP BY R.region_id";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélection des domaines à présenter en page d'accueil
	public function getDomaine($frs_id="") {
		if(empty($frs_id)) {
			$sql = "SELECT * FROM fournisseurs WHERE frs_name IN('Domaine clavel', 'Domaine de la goujonne', 'Domaine la chrétienne', 'Grands vins du vieux monde')";
			$stmt = $this->_db->prepare($sql);
		} else {
			$sql = "SELECT * FROM fournisseurs WHERE frs_id = :frs_id";
			$stmt = $this->_db->prepare($sql);
			$stmt->bindparam(':frs_id', $frs_id);
		}
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}

	// Sélection de tous les domaines que l'on veut présenter
	public function getAllDomaines($frs_id="") {
		$sql = "SELECT * FROM fournisseurs WHERE frs_name IN('alain geoffroy','Arnaud de villeneuve', 'Champagne jean-noel haton', 'Champagne soutiran', 'Domaine clavel', 'Domaine de la goujonne', 'Domaine la chrétienne', 'Earl Chateau de La Greffiere', 'Famille Fabre Sarl', 'Grands vins du vieux monde', 'joseph cartron', 'leda', 'lionel faury', 'manoir du capucin - earl bayon-pichon', 'melody - marc+marlene', 'Sc Domaine Des Bormettes', 'Sca Cellier Des Chartreux', 'scea les jardinettes', 'vinho selection')";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}
}