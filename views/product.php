<?php
require('../connect.php');
require('../class/ProductManager.php');
require('../class/Stat.php');
require('../class/StatManager.php');
require('../process/process_cookie.php');

$prod_id = (int) htmlspecialchars($_GET['prod_id']);

$products = new ProductManager($db);
$product = $products->getProduct($prod_id);
$appell = $products->getAppell($prod_id);
$cont = $products->getContenant($prod_id);
$colorProd = $products->getColor($prod_id);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Page de détail d'un produit de la Cave Bourvence">
		<title>Cave Bourvence, Votre cave à vin</title>

		<link rel="stylesheet" href="/bourvence/css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<script src="/bourvence/tarteaucitron/tarteaucitron.js"></script>
		<script type="text/javascript" src="/bourvence/js/cookies.js"></script>

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
		<?php include('nav.php') ?>

		<main>
			<h1 class="center"><?= $product[0]['prod_name'] ?></h1>

			<div class="container fiche">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<img src="/bourvence/img/products/<?= $product[0]['prod_img'] ?>" alt="<?= $product[0]['prod_name'] ?>" height="500" >
					</div>
					<div class="row col-xs-12 col-sm-9">
						<div class="row desc-prod">
							<div class="col-xs-12 col-md-4"><strong>Appellation : </strong></div>
							<?php if($appell[0]['appell_name'] == 'Non définie'): ?>
							<div class="col-xs-12 col-md-8">-</div>
							<?php else: ?>
							<div class="col-xs-12 col-md-8"><?= $appell[0]['appell_name'] ?></div>
							<?php endif ?>
						</div>
												
						<div class="row desc-prod">
							<div class="col-xs-12 col-md-4"><strong>Description : </strong></div>
							<div class="col-xs-12 col-md-8"><?= $product[0]['prod_desc'] ?></div>
						</div>
						<div class="row desc-prod">
							<div class="col-xs-12 col-md-4"><strong>Contenant : </strong></div>
							<?php if($cont[0]['cont_name'] == 'Non définie'): ?>
								<div class="col-xs-12 col-md-8">-</div>
							<?php else: ?>
								<div class="col-xs-12 col-md-8"><?= $cont[0]['cont_name'] ?></div>
							<?php endif ?>
						</div>
						<div class="row desc-prod">
							<div class="col-xs-12 col-md-4"><strong>Couleur : </strong></div>
							<?php if($colorProd[0]['color_name'] == 'Non définie'): ?>
								<div class="col-xs-12 col-md-8">-</div>
							<?php else: ?>
							<div class="col-xs-12 col-md-8"><?= $colorProd[0]['color_name'] ?></div>
							<?php endif ?>
						</div>
						<p class="conseil">
							N’hésitez pas à venir à la Cave Bourvence à Plan-de-Cuques, à côté de Marseille et d’Allauch, pour découvrir notre large choix de vins, de champagnes, de bières, de jus de fruits et de spiritueux, accompagné de nos conseils.<br/><br/>
							Pour vos idées cadeaux, vous y trouverez également des accessoires, de la verrerie ainsi que quelques articles d’épicerie fine, à votre disposition.
						</p>
					</div>
				</div>
			</div>

			<div>
				<h3 class="center">Une question ?</h3>
				<?php include('contactForm.php') ?>
			</div>
		</main>

		<?php include('footer.php');?>
	</body>
</html>