<?php
session_start();
require('../connect.php');
require('../class/ProductManager.php');
require('../class/Stat.php');
require('../class/StatManager.php');
require('../process/process_cookie.php');

$products = $_SESSION['searchs'];
$nbr = count($products);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recherche sur les produits</title>

	<link rel="stylesheet" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z36N7G2D2K"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-Z36N7G2D2K');
	</script>
</head>

<body>
	<main class="container">
		<div class="container center">
			<a role="button" class="btn btn-product" href="../index.php">Retour à l'accueil</a>
		</div>
		<h1 class="center">Résultat de votre recherche</h1>

		<small><?= $nbr ?> résultats trouvés</small>

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
		
		<?php if($products): ?>
			<ul>
				<?php foreach($products as $product): ?>
					<h2 id=<?= $product['prod_id']?>><strong><?= $product['prod_name'] ?></strong></h2>
					<p><?= substr($product['prod_desc'], 0, 200) ?> ... <a href="product.php?prod_id=<?= $product['prod_id'] ?>"><strong>Voir le produit</strong></a></p>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
	</main>
</body>
</html>