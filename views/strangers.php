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

<?php include('nav.php'); ?>

<main>
	<?php
	$product = new ProductManager($db);
	$regionsStranger = $product->getRegionStranger();
	?>
	<div class="container">
		<div class="row">
			<?php foreach($regionsStranger as $region): ?>
				<div class="col-sm-2 card-regions">
					<div class="card" style="width: 10rem;">
						<img src="/bourvence/img/regions/<?= $region['region_name'] ?>.png" class="card-img-top" alt="<?= $region['region_name']  ?>" height="100">
			  			<h5 class="card-title center"><strong><?= $region['region_name']  ?></strong></h5>
			  			<div class="card-footer">
			  				<a href="products.php?region_id=<?= $region['region_id']?>" class="btn btn-product">En savoir plus</a>
			  			</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	
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