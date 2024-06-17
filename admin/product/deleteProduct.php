<?php
session_start();
require('../../connect.php');
require('../../class/UserManager.php');
require('../../class/ProductManager.php');
$dirname = dirname(__FILE__);
$basename = basename($dirname);
$filename = $basename ."/". basename(__FILE__);
require('../../process/process_user.php');
require('../../process/process_permiss.php');

$product = new ProductManager($db);

if(isset($_GET['prod_id']) and !empty($_GET['prod_id'])) {
	// données envoyées sécurisées
	$prod_id = (int) trim(htmlspecialchars($_GET['prod_id']));
	$product = $product->deleteProduct($prod_id);
	if(!$product) {
		$_SESSION['error'] = "Id inexistant";
		header('location:listProduct.php');
	}	
	$_SESSION['success'] = "produit supprimé";
	header('location:listProduct.php');
} else {
	$_SESSION['error'] = "URL invalide";
	header('location:listProduct.php');
}