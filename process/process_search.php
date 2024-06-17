<?php
session_start();
require('../connect.php');
require('../class/ProductManager.php');

use TeamTNT\TNTSearch\TNTSearch;
$products = new ProductManager($db);
$searchs = [];

if(isset($_POST['q']) AND !empty($_POST['q'])) {
	$search = htmlspecialchars($_POST['q']);
	$product = $products->getSearchProduct($search);
	$tnt = new TNTSearch;
	$tnt->loadConfig([
		'driver' => 'mysql',
		'host' => DBHOST,
		'database' => DBNAME,
		'username' => DBUSER,
		'password' => DBPASS,
		'storage' => '.',
		'stemmer' => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class	
	]);

	$tnt->selectIndex('../moteur_recherche/products.index');
	$searchResult = $tnt->search($search, 50);
	$ids = implode(", ", $searchResult['ids']);
	if($ids) {
		$sql = $db->query("SELECT * FROM products WHERE prod_id IN ($ids)");
		$searchs = $sql->fetchAll(PDO::FETCH_ASSOC);
		$_SESSION['searchs'] = $searchs;
		header('location:../views/search.php');
	} else {
		$_SESSION['error'] = "Pas de résultat pour votre recherche ' ". $search ." '";
		header('location:../index.php');
	}
}