<?php
require('../connect.php');
require('../class/ProductManager.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<body  id="debut">
		<?php include('nav.php'); ?>

		<main>
			<?php 
				if(isset($_GET['family_id'])) {
					$family_id = (int) htmlspecialchars($_GET['family_id']);
					$product = new ProductManager($db);
					$products = $product->getProductFamily($family_id);
				}
				if(isset($_GET['region_id'])) {
					$product = new ProductManager($db);
					$region_id = (int) htmlspecialchars($_GET['region_id']);
					$prodByRegion = $product->getProductRegion($region_id);
				}
				if(isset($_GET['color_id'])) {
					$color_id = (int) htmlspecialchars($_GET['color_id']);
					$prodByColor = $product->getProductColor($color_id);
				}
			?>
			<div class="container">
				<div class="row">
					<?php if(isset($prodByColor)): ?>
						<h1 class="center"><?= $prodByColor[0]['color_name'] ?></h1>
						<?php foreach($prodByColor as $prodCol): ?>
						<div class="col-sm-4">
							<div class="card card-products" style="width: 18rem;">
								<img src="/bourvence/img/products/vignettes/<?= $prodCol['prod_img'] ?>" class="card-img-top" alt="<?= $prodCol['prod_name'] ?>" height="300">
					  			<h5 class="card-title center"><strong><?= $prodCol['prod_name'] ?></strong></h5>
					  			<div class="card-body">
					   				<p class="card-text"><small><?= $prodCol['prod_desc'] ?></small></p>
					  			</div>
					  			<div class="card-footer">
					  				<a href="product.php?prod_id=<?=$prodCol['prod_id']?>" class="btn btn-product">Voir le produit</a>
					  			</div>
							</div>
						</div>
						<?php endforeach ?>
					<?php elseif(isset($prodByRegion)): ?>
						<h1 class="center">
							<?php if($prodByRegion[0]['region_name'] == "Non définie") {
									echo "Accessoires Divers";
								} else {
									echo $prodByRegion[0]['region_name'];
								} 
							?>
						</h1>
						<?php foreach($prodByRegion as $prod): ?>
						<div class="col-sm-4">
							<div class="card card-products" style="width: 18rem;">
								<img src="/bourvence/img/products/vignettes/<?= $prod['prod_img'] ?>" class="card-img-top" alt="<?= $prod['prod_name'] ?>" max-width="100%" height="auto">
					  			<h5 class="card-title center"><strong><?= $prod['prod_name'] ?></strong></h5>
					  			<div class="card-body">
					   				<p class="card-text"><small><?= $prod['prod_desc'] ?></small></p>
					  			</div>
					  			<div class="card-footer">
					  				<a href="product.php?prod_id=<?=$prod['prod_id']?>" class="btn btn-product">Voir le produit</a>
					  			</div>
							</div>
						</div>
						<?php endforeach ?>
					<?php else: ?>
						<h1 class="center"><?= $products[0]['family_name'] ?></h1>
						<?php foreach($products as $product): ?>
						<div class="col-sm-4">
							<div class="card card-products" style="width: 18rem;">
								<img src="/bourvence/img/products/vignettes/<?= $product['prod_img'] ?>" class="card-img-top" alt="<?= $product['prod_name'] ?>" height="300">
					  			<h5 class="card-title center"><strong><?= $product['prod_name'] ?></strong></h5>
					  			<div class="card-body">
					   				<p class="card-text"><small><?= $product['prod_desc'] ?></small></p>
					  			</div>
					  			<div class="card-footer">
					  				<a href="product.php?prod_id=<?=$product['prod_id']?>" class="btn btn-product">Voir le produit</a>
					  			</div>
							</div>
						</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
			
			<a class="ancre" href="#debut"><i class="bi bi-arrow-up-circle-fill" style="font-size: 5rem; color: #573b50;"></i></a>

			<div>
				<p class="conseil">
					N’hésitez pas à venir à la Cave Bourvence à Plan-de-Cuques, à côté de Marseille et d’Allauch, pour découvrir notre large choix de vins, de champagnes, de bières, de jus de fruits et de spiritueux, accompagné de nos conseils.<br/><br/>
					Pour vos idées cadeaux, vous y trouverez également des accessoires, de la verrerie ainsi que quelques articles d’épicerie fine, à votre disposition.
				</p>
			</div>
			<div>
				<h3 class="center">Une question ?</h3>
				<?php include('contactForm.php') ?>
			</div>
		</main>

		<?php include('footer.php') ?>
	</body>
</html>