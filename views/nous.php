<?php
require('../connect.php');
require('../class/Stat.php');
require('../class/StatManager.php');
require('../process/process_cookie.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Page de présentation de la Cave Bourvence">
		<title>Qui sommes-nous ?</title>

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
		<header>
			<div class="bloc-center">
				<h2>BIENVENUE À LA CAVE BOURVENCE SUR PLAN-DE-CUQUES</h2>
				<div class="line"></div>
			</div>
		</header>

		<main>
			<div class="container">
				<div class="row">
					<div class="col-6">
						<p>
							Créée depuis 1994, la Cave Bourvence sur Plan de Cuques, entre Marseille et Allauch, vous accueille avec une nouvelle équipe depuis le 1er juillet 2017, constituée d’un sommelier-conseil expérimenté et d’un caviste.<br/><br/>
							
							Un espace dédié de 120 m² réaménagé vous attend afin de vous faire découvrir notre sélection de :<br/>
						
							<ul>
								<li class="pastille">Vins en bouteille (blanc, rouge ou rosé), en magnum ou en Jéroboam</li>
								<li class="pastille">Bag In Box ( 3L, 5L ou 10L)</li>
								<li class="pastille">Champagnes</li>
								<li class="pastille">Spiritueux (Whiskies, Rhums, Armagnac, Cognac…)</li>
							</ul><br>
						
							La CAVE BOURVENCE à Plan-de-Cuques, vous propose également des bières, des jus de fruits, de la verrerie, de l’épicerie fine et des accessoires (tire-bouchons, Vacuvin, Aérateurs ...).<br/><br/>
						</p>
					</div>
				
					
					<div class="col-6">
						<p>
							La CAVE BOURVENCE met un accent tout particulier sur la sélection de ses vins. En plus des vins dont on ne peut plus caché leurs réputations, notre expert recherche pour vous de petits vignerons de grande qualité afin de vous proposer des vins avec un très bon rapport qualité/prix.<br/><br/>

							Notre équipe est là pour vous conseiller et vous guider afin de répondre au mieux à vos attentes.<br/><br/>

							Tous les mois, <a href="../index.php"><strong>LA CAVE BOURVENCE</strong></a> organise une soirée de dégustation à thème afin de vous faire découvrir les pépites de nos vignerons.<br/><br/>

							Nos petits plus :
							<ul>
								<li>- Confection de coffrets cadeaux sur mesure</li>
								<li>- Service de livraison à proximité.</li>
							</ul><br>

							N'hésitez pas à nous contacter pour des idées cadeaux autour du vin ou pour un atelier de dégustation.
						</p>
					</div>
				</div>			
			</div>

			<div id="logo" class="center">
				<a href="../index.php"><img class="logo" src="../img/logo_bourvence.png" alt="logo Cave Bourvence" height="130" width="280"></a>
			</div>
		</main>

		<?php include('footer.php') ?>
	</body>
</html>