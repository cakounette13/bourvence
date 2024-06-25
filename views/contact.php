<?php
require('../connect.php');
require('../class/Stat.php');
require('../class/StatManager.php');
require('../process/process_cookie.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Page de formulaire de Contact avec la Cave Bourvence">
		<title>Contact avec la Cave Bourvence</title>

		<link rel="stylesheet" href="/bourvence/css/style.css">
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
		<div id="logo">
			<a href="/bourvence/index.php"><img class="logo" src="/bourvence/img/logo_bourvence.png" alt="logo Cave Bourvence" height="130" width="280"></a>
		</div>

		<h1 class="center">Contact</h1>

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

		<?php include('contactForm.php'); ?>

		<p class="conseil">
			N’hésitez pas à venir à la <a href="../index.php"><strong>Cave Bourvence</strong></a> à Plan-de-Cuques, à côté de Marseille et d’Allauch, pour découvrir notre large choix de vins, de champagnes, de bières, de jus de fruits et de spiritueux, accompagné de nos conseils.<br/><br/>
			Pour vos idées cadeaux, vous y trouverez également des accessoires, de la verrerie ainsi que quelques articles d’épicerie fine, à votre disposition.
		</p>
		<div class="container center">
			<a role="button" class="btn btn-product" href="/bourvence/index.php">Retour au site</a>
		</div>

		<?php include('footer.php') ?>
	</body>
</html>