<?php
require('../connect.php');
require('../class/ProductManager.php');
require('../class/Stat.php');
require('../class/StatManager.php');
require('../process/process_cookie.php');

$frs_id = (int) htmlspecialchars($_GET['frs_id']);

$products = new ProductManager($db);
$domaines = $products->getAllDomaines($frs_id);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Page d'un domaine vinicole représenté à la Cave Bourvence">
		<title>Cave Bourvence, Un de nos domaine</title>

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

	<body id="debut">
		<?php include('nav.php') ?>

		<main>
			<?php if(!empty($_SESSION['error'])): ?>
				<div class="alert alert-danger" role="alert">
					<?= $_SESSION['error'] ?>
					<?php $_SESSION['error'] = "" ?>
				</div>
			<?php endif ?>

			<div class="container ficheDomaine">
				<div class="row center">
					<h1 class="col-12 center"><?= $domaines[0]['frs_name'] ?></h1>
					<div class="col-12 col-lg-6 img-domaine">
						<img src="/bourvence/img/domaines/<?= $domaines[0]['frs_img'] ?>" alt="<?= $domaines[0]['frs_name'] ?>" width="300" height="300" >
					</div>
													
					<div class="col-12 col-lg-6">
						<p><?= $domaines[0]['frs_desc'] ?></p>
						<br>
						<a href="<?= $domaines[0]['frs_site_web'] ?>" class="btn btn-product" target="_blanck">Accès vers leur site</a>
					</div>

				</div>
			</div>

			<div class="container-fluid">
				<div class="row col-xs-12">
					<div class="col-xs-12 col-sm-3 col-lg-2 filter">
						<?php include('filter.php') ?>
					</div>
					<div class="row col-xs-12 col-sm-8 col-lg-9">
						<?php foreach($domaines as $domaine): ?>
						<div class="col-md-6 col-lg-4">
							<div class="card card-products">
								<img src="/bourvence/img/products/vignettes/<?= $domaine['prod_img'] ?>" class="card-img-top" alt="<?= $domaine['prod_name'] ?>" height="300">
					  			<h5 class="card-title center"><strong><?= $domaine['prod_name'] ?></strong></h5>
					  			<div class="card-body">
					   				<p class="card-text"><small><?= $domaine['prod_desc'] ?></small></p>
					  			</div>
					  			<div class="card-footer">
					  				<a href="product.php?prod_id=<?=$domaine['prod_id']?>" class="btn btn-product">Voir le produit</a>
					  			</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>										
				</div>
			</div>
				
			<a class="ancre" href="#debut"><i class="bi bi-arrow-up-circle-fill" style="font-size: 5rem; color: #573b50;"></i></a>
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