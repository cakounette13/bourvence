<?php
session_start();
require('connect.php');
require('class/ProductManager.php');
require('class/Stat.php');
require('class/StatManager.php');
require('process/process_cookie.php');

if(isset($_GET['prod_id'])) {
	$prod_id = (int) htmlspecialchars($_GET['prod_id']);
} 

$products = new ProductManager($db);
$families = $products->getFamily();
$regions = $products->getRegion();
$colors = $products->getColorFamily();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Page d'accueil du site de la Cave Bourvence">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cave Bourvence, Votre cave à vin</title>

		<link rel="stylesheet" href="css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<script src="tarteaucitron/tarteaucitron.js"></script>
		<script type="text/javascript" src="js/cookies.js"></script>
		<script type="text/javascript" src="js/modal.js"></script>
	</head>

	<body>
		<?php include('views/modal.php') ?>
		
		<?php if(!empty($_SESSION['error'])): ?>
			<div class="alert alert-danger" role="alert">
				<?= $_SESSION['error'] ?>
				<?php $_SESSION['error'] = "" ?>
			</div>
		<?php endif ?>
		
		<?php include('views/nav.php') ?>
			
		<?php include('views/carousel.php')	?>

		<?php include('views/main.php') ?>

		<?php include('views/footer.php') ?>		
	</body>
</html>