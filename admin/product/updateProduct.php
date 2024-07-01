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

if(isset($_GET['prod_id']) and !empty($_GET['prod_id'])) {
	// données envoyées sécurisées
	$product = new ProductManager($db);
	$prod_id = (int) trim(htmlspecialchars($_GET['prod_id']));
	$product = $product->getProduct($prod_id);
	if(!$product) {
		$_SESSION['error'] = "Id inexistant";
		header('location:listProduct.php');
	}
} else {
	$_SESSION['error'] = "URL invalide";
	header('location:listProduct.php');
}
$product2 = new ProductManager($db);
$products = $product2->getProduct();
$families = $product2->getFamily();
$appellations = $product2->getAppell();
$regions = $product2->getRegion();
$fournisseurs = $product2->getFrs();
$colors = $product2->getColor();
$contenants = $product2->getContenant();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cave Bourvence, Votre cave à vin</title>

	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<h1 class="center">Modification d'un produit</h1>

<?php if(!empty($_SESSION['success'])): ?>
	<div class="alert alert-success" role="alert">
		<?= $_SESSION['success'] ?>
		<?php $_SESSION['success'] = "" ?>
	</div>
<?php endif ?>

<?php if(!empty($_SESSION['error'])): ?>
	<div class="alert alert-danger" role="alert">
		<?= $_SESSION['error'] ?>
		<?php $_SESSION['error'] = "" ?>
	</div>
<?php endif ?>

<div class="container-fluid flex-wrap col-lg-12">
	<form action="../../process/process_product.php" method="POST" id="updateProduct" enctype="multipart/form-data" class="col-lg-6 col-md-12">
		<div class="form-group row">
			<input class="col-lg-4 col-12" type="hidden" name="prod_id" value="<?= $product[0]['prod_id'] ?>">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="name">nom produit</label>
			<input class="col-lg-7 col-12" type="text" name="prod_name" value="<?= $product[0]['prod_name'] ?>" id="name" >
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="desc">Description produit</label>
			<textarea class="col-lg-7 col-12" type="textarea" name="prod_desc" rows="4" cols="20" id="desc"><?= $product[0]['prod_desc'] ?></textarea>
		</div>
		<div class="form-group row">
			<input type="hidden" name="old_img" value="<?= $product[0]['prod_img'] ?>">
			<img class="col-lg-7 col-12" src="../../img/products/<?= $product[0]['prod_img']?>" alt="<?= $product[0]['prod_img'] ?>" width="50" height="50">	
		</div>
		<div class="form-group row">
			<input class="col-lg-7 col-12" type="file" name="new_img">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="family">Famille</label>
			<select class="col-lg-7 col-12" type="select" name="family_id" id="family">
				<?php foreach($families as $family) {
					if($product[0]['family_id'] === $family['family_id']) {
						if ($product[0]['family_id'] === 0) {
							echo '<option selected="selected" value="'. $product[0]['family_id'] .'"> - </option>';
						} else {
						echo '<option selected="selected" value="'. $product[0]['family_id'] .'">'. $family['family_name'] .'</option>';
						}
					} else {
						echo '<option value="'. $family['family_id'] .'">'. $family['family_name'] .'</option>';
					} 
				}?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="appellation">Appellation</label>
			<select class="col-lg-7 col-12" type="select" name="appell_id" id="appellation">
				<?php foreach($appellations as $appellation) {
					if ($appellation['appell_id'] === $product[0]['appell_id']) {
						if($product[0]['appell_id'] === '0'){
							echo '<option selected="selected" value="'. $product[0]['appell_id'] .'"> - </option>';
						} else {
							echo '<option selected="selected" value="'. $product[0]['appell_id'] .'">'. $appellation['appell_name'] .'</option>';
						}
					} else {
						echo '<option value="'. $appellation['appell_id'] .'">'. $appellation['appell_name'] .'</option>';
					} 
				}?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="region">Région</label>
			<select class="col-lg-7 col-12" type="select" name="region_id" id="region">
				<?php foreach($regions as $region) {
					if($region['region_id'] === $product[0]['region_id']) {
						if($product[0]['region_id'] === '0') {
							echo '<option selected="selected" value="'. $product[0]['region_id'] .'"> - </option>';
						} else {
						echo '<option selected="selected" value="'. $product[0]['region_id'] .'">'. $region['region_name'] .'</option>';
						}
					} else {
						echo '<option value="'. $region['region_id'] .'">'. $region['region_name'] .'</option>';
					} 
				}?>
			</select>
		</div>

		<div class="form-group row">
			<label class="col-lg-4 col-12" for="frs">Fournisseur</label>
			<select class="col-lg-7 col-12" type="select" name="frs_id" id="frs">
				<?php foreach($fournisseurs as $fournisseur) {
					if($fournisseur['frs_id'] === $product[0]['frs_id']) {
						echo '<option selected="selected" value="'. $product[0]['frs_id'] .'">'. $fournisseur['frs_name'] .'</option>';
					} else {
						echo '<option value="'. $fournisseur['frs_id'] .'">'. $fournisseur['frs_name'] .'</option>';
					} 
				}?>
			</select>
		</div>
		
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="color">Couleur</label>
			<select class="col-lg-7 col-12" type="select" name="color_id" id="color">
				<?php foreach($colors as $color) {
					if($color['color_id'] === $product[0]['color_id']) {
						if($color['color_id'] === '0') {
							echo '<option selected="selected" value="'. $product[0]['color_id'] .'"> - </option>';
						} else {
							echo '<option selected="selected" value="'. $product[0]['color_id'] .'">'. $color['color_name'] .'</option>';
						}
					} else {
						echo '<option value="'. $color['color_id'] .'">'. $color['color_name'] .'</option>';
					} 
				}?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="contenant">Contenant</label>
			<select class="col-lg-7 col-12" type="select" name="cont_id" id="contenant">
				<?php foreach($contenants as $contenant) {
					if($contenant['cont_id'] === $product[0]['cont_id']) {
						if($product[0]['cont_id'] === '0') {
							echo '<option selected="selected" value="'. $product[0]['cont_id'] .'"> - </option>';
						} else {
							echo '<option selected="selected" value="'. $product[0]['cont_id'] .'">'. $contenant['cont_name'] .'</option>';
						}
					} else {
						echo '<option value="'. $contenant['cont_id'] .'">'. $contenant['cont_name'] .'</option>';
					} 
				}?>
			</select>
		</div>

		<div class="col-sm-12 center">
			<input type="submit" name="submitUpdateProduct" class="btn submit"> 
		</div>
	</form>
</div>
<div class="container center">
	<a role="button" class="btn btn-product" href="listProduct.php">Retour à la liste</a>
	<a role="button" class="btn btn-product" href="../../index.php">Retour au site</a>
</div>
