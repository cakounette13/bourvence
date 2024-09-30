<?php
session_start();
require('../connect.php');
require('../class/Product.php');
require('../class/ProductManager.php');

$products = new ProductManager($db);

if(isset($_POST['submitInsertProduct'])) {

	if(isset($_POST['prod_id']) AND !empty($_POST['prod_id']) AND isset($_POST['prod_name']) AND !empty($_POST['prod_name']) AND isset($_POST['prod_desc']) AND !empty($_POST['prod_desc']) AND isset($_FILES['new_img']) AND isset($_POST['family_id']) AND !empty($_POST['family_id']) AND isset($_POST['appell_id']) AND isset($_POST['region_id']) AND isset($_POST['frs_id']) AND !empty($_POST['frs_id']) AND isset($_POST['color_id']) AND isset($_POST['cont_id'])) {
		// Récupération des données du formulaire
		$prod_id = (int) trim(htmlspecialchars($_POST['prod_id']));
		$product = $products->getProduct($prod_id);
		if($product) {
			$_SESSION['error'] = "produit avec Id n° ". $prod_id ." déjà existant";
			header('location:../admin/listproduct.php');
		}
		$data['prod_id'] = (int) trim(htmlspecialchars($_POST['prod_id']));
		$data['prod_name'] = trim(htmlspecialchars($_POST['prod_name']));
		$data['prod_desc'] = trim(htmlspecialchars($_POST['prod_desc']));
		$data['prod_img'] = $_FILES['new_img']['name'];
		$data['family_id'] = (int) trim(htmlspecialchars($_POST['family_id']));
		$data['appell_id'] = (int) trim(htmlspecialchars($_POST['appell_id']));
		$data['region_id'] = (int) trim(htmlspecialchars($_POST['region_id']));
		$data['frs_id'] = (int) trim(htmlspecialchars($_POST['frs_id']));
		$data['color_id'] = (int) trim(htmlspecialchars($_POST['color_id']));
		$data['cont_id'] = (int) trim(htmlspecialchars($_POST['cont_id']));
		$productData = new Product($data);
		$products->insertProduct($productData);
		$_SESSION['success'] = "Le produit a bien été créé";
	if($products->uploadImgProd($data['prod_img']) === True) {
		$_SESSION['success'] .= " et l'image a bien été téléchargée";
	} else {
		$_SESSION['error'] .= " mais l'image n'a pas été téléchargée";
	}
	header('location:../admin/product/insertProduct.php');
	} else {
	$_SESSION['error'] = "Le Produit est incomplet";
	header('location:../admin/product/insertProduct.php');
	}
}

if(isset($_POST['submitUpdateProduct'])) {
	if(isset($_POST['prod_id']) AND isset($_POST['prod_name']) AND isset($_POST['prod_desc']) AND isset($_POST['old_img']) AND isset($_POST['family_id']) AND isset($_POST['appell_id']) AND isset($_POST['region_id']) AND isset($_POST['frs_id']) AND isset($_POST['color_id']) AND isset($_POST['cont_id'])) {
		// Récupération des données du formulaire
		$data['prod_id'] = (int) trim(htmlspecialchars($_POST['prod_id']));
		$data['prod_name'] = trim(htmlspecialchars($_POST['prod_name']));
		$data['prod_desc'] = trim(htmlspecialchars($_POST['prod_desc']));
		$data['family_id'] = (int) trim(htmlspecialchars($_POST['family_id']));
		$data['appell_id'] = (int) trim(htmlspecialchars($_POST['appell_id']));
		$data['region_id'] = (int) trim(htmlspecialchars($_POST['region_id']));
		$data['frs_id'] = (int) trim(htmlspecialchars($_POST['frs_id']));
		$data['color_id'] = (int) trim(htmlspecialchars($_POST['color_id']));
		$data['cont_id'] = (int) trim(htmlspecialchars($_POST['cont_id']));
		$old_img= $_POST['old_img'];
		$new_img = $_FILES['new_img']['name'];
		$prod_img = "";
		if($new_img != null) {
			$data['prod_img'] = $new_img;
		} else {
			$data['prod_img'] = $old_img;
		}
		$productData = new Product($data);
		$products->updateProduct($productData);
		$_SESSION['success'] = "Le produit a bien été modifié";
		if($products->uploadImgProd($data['prod_img']) === True) {
			$data['prod_img'] = $new_img;
			$_SESSION['success'] .= " et l'image a bien été téléchargée";
		} else {
			$_SESSION['error'] .= " mais l'image n'a pas été téléchargée";
		}
		header('location:../admin/product/updateProduct.php?prod_id='. $data['prod_id']);
	} else {
		$_SESSION['error'] = "Le produit n'a pas été modifié, une erreur est survenue !";
		header('location:../admin/product/updateProduct.php?prod_id='. $data['prod_id']);
	}
}