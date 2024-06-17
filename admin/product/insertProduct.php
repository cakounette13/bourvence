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

$families = $product->getFamily();
$appellations = $product->getAppell();
$regions = $product->getRegion();
$fournisseurs = $product->getFrs();
$colors = $product->getColor();
$contenants = $product->getContenant();
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

<h1 class="center">Création d'un produit</h1>

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

<div class="container-fluid col-lg-12">
	<form action="../../process/process_product.php" method="POST" id="insertProduct" enctype="multipart/form-data" class="col-lg-6 col-md-12">
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="id">produit Id</label>
			<input class="col-lg-4 col-12" type="text" name="prod_id" id="id" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="name">nom produit</label>
			<input class="col-lg-7 col-12" type="text" name="prod_name" id="name" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="desc">Description produit</label>
			<textarea class="col-lg-7 col-12" type="textarea" name="prod_desc" rows="4" cols="20" id="desc" required></textarea>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12"for="prix">Prix TTC du produit</label>
			<input class="col-lg-4 col-12" type="float" name="prod_prix_ttc" id="prix" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12"for="img">Image à télécharger</label>
			<input class="col-lg-7 col-12" type="file" name="new_img" id="img" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="family">Famille</label>
			<select class="col-lg-7 col-12" type="select" name="family_id" id="family" required>
				<option value="0"></option>
				<?php foreach($families as $family) {
					echo '<option value="'. $family['family_id'] .'">'. $family['family_name'] .'</option>';
				} ?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="appellation">Appellation</label>
			<select class="col-lg-7 col-12" type="select" name="appell_id" id="appellation">
				<option value="0"></option>';
				<?php foreach($appellations as $appellation) {
					echo '<option value="'. $appellation['appell_id'] .'">'. $appellation['appell_name'] .'</option>';
				} ?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="region">Région</label>
			<select class="col-lg-7 col-12" type="select" name="region_id" id="region">
				<option value="0"></option>';
				<?php foreach($regions as $region) {
					echo '<option value="'. $region['region_id'] .'">'. $region['region_name'] .'</option>';
				} ?>
			</select>
		</div>

		<div class="form-group row">
			<label class="col-lg-4 col-12" for="frs">Fournisseur</label>
			<select class="col-lg-7 col-12" type="select" name="frs_id" id="frs" required>
				<option value="0"></option>';
				<?php foreach($fournisseurs as $fournisseur) {
					echo '<option value="'. $fournisseur['frs_id'] .'">'. $fournisseur['frs_name'] .'</option>'; 
				}?>
			</select>
		</div>
		
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="color">Couleur</label>
			<select class="col-lg-7 col-12" type="select" name="color_id" id="color">
				<option value="0"></option>';
				<?php foreach($colors as $color) {
					echo '<option value="'. $color['color_id'] .'">'. $color['color_name'] .'</option>';
				}?>
			</select>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="contenant">Contenant</label>
			<select class="col-lg-7 col-12" type="select" name="cont_id" id="contenant">
				<option value="0"></option>';
				<?php foreach($contenants as $contenant) {
					echo '<option value="'. $contenant['cont_id'] .'">'. $contenant['cont_name'] .'</option>'; 
				}?>
			</select>
		</div>

		<div class="col-sm-12 center">
			<input type="submit" name="submitInsertProduct" class="btn submit">
		</div>
	</form>	
</div>
<div class="container center">
	<a role="button" class="btn btn-xs btn-product" href="../menu.php">Retour à l'accueil Administrateur</a>
	<a role="button" class="btn btn-xs btn-product" href="listProduct.php">Retour à la liste</a>
	<a role="button" class="btn btn-xs btn-product" href="../../index.php">Retour au site</a>
</div>

