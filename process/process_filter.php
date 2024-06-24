<?php
session_start();
require('../connect.php');
require('../class/ProductManager.php');

$products = new ProductManager($db);

if(isset($_POST['submitFilter'])) {
	$family_id = trim(htmlspecialchars(isset($_POST['family']) ? $_POST['family'] : ''));
	var_dump($family_id);
	$color_id = trim(htmlspecialchars(isset($_POST['color']) ? $_POST['color'] : ''));
	$cont_id = trim(htmlspecialchars(isset($_POST['cont']) ? $_POST['cont'] : ''));
	$region_id = trim(htmlspecialchars(isset($_POST['region']) ? $_POST['region'] : ''));
	$appell_id = trim(htmlspecialchars(isset($_POST['appell']) ? $_POST['appell'] : ''));
	$price_min = trim(htmlspecialchars(isset($_POST['price_min']) ? $_POST['price_min'] : ''));
	$price_max = trim(htmlspecialchars(isset($_POST['price_max']) ? $_POST['price_max'] : ''));
	
	$sql = "SELECT * FROM products WHERE 1=1";
	if ($family_id) {
    	$sql .= " AND family_id = :family_id";
	}
	if ($color_id) {
	    $sql .= " AND color_id = :color_id";
	}
	if ($cont_id) {
	    $sql .= " AND cont_id = :cont_id";
	}
	if ($region_id) {
	    $sql .= " AND region_id = :region_id";
	}
	if ($appell_id) {
	    $sql .= " AND appell_id = :appell_id";
	}
	if ($price_min) {
	    $sql .= " AND prod_prix_ttc >= :price_min";
	}
	if ($price_max) {
	    $sql .= " AND prod_prix_ttc <= :price_max";
	}
	$stmt = $db->prepare($sql);

	if ($family_id) {
	    $stmt->bindParam(':family_id', $family_id);
	}
	if ($color_id) {
	    $stmt->bindParam(':color_id', $color_id);
	}
	if ($cont_id) {
	    $stmt->bindParam(':cont_id', $cont_id);
	}
	if ($region_id) {
	    $stmt->bindParam(':region_id', $region_id);
	}
	if ($appell_id) {
	    $stmt->bindParam(':appell_id', $appell_id);
	}
	if ($price_min) {
	    $stmt->bindParam(':price_min', $price_min);
	}
	if ($price_max) {
	    $stmt->bindParam(':price_max', $price_max);
	}
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$filter[] = $row;
	}
	
	$_SESSION['filter'] = $filter;
	header('location:/bourvence/views/result_filter.php');
} else {
	$_SESSION['error'] = "Pas de résultat pour votre recherche ' ". $filter ." '";
	header('location:../index.php');
}
?>