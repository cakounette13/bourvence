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
			<h2>Mentions légales</h2>
			<div class="line"></div>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="col">
					<p>
						<strong>Nom de la société : </strong>CAVE BOURVENCE<br/>
						<strong>Forme Juridique : </strong>SAS<br/>
						<strong>Numéro de Siret : </strong>900 195 280 00012<br/>
						<strong>Nom du Président : </strong>DELRIEUX Didier<br/>

						<strong>Adresse de la société : </strong>37 AVENUE LOUIS ENJOLRAS - - 13380 PLAN DE CUQUES<br/>
						<strong>Adresse du siège social de la société : </strong>37 AVENUE LOUIS ENJOLRAS - - 13380 PLAN DE CUQUES<br/>
						<strong>Téléphone de la société : </strong>04.91.07.29.19<br/>
						<strong>Adresse éléctronique : </strong>cavebourvence@gmail.com<br/>
						<strong>Montant Capital : </strong>141.400 €<br/>
						<strong>EDITEUR DE LA PUBLICATION : </strong>CAVE BOURVENCE<br/>
						<strong>DIRECTEUR DE LA PUBLICATION : </strong>CAVE BOURVENCE<br/>
						<strong>RESPONSABLE DE LA REDACTION : </strong>CAVE BOURVENCE<br/>
						<strong>HEBERGEUR : </strong>HOSTINGER INTERNATIONAL LTD, 61 Lordou Vironos Street, 6023 Larnaca, Chypre, joignable à l'adresse suivante: "https://www.hostinger.fr/contact".<br/>
						<strong>WEBMASTER : </strong>DELRIEUX Carine
					</p>
				</div>
			</div>

			<div class="row">
				<strong>Liens pour les droits à l'image :</strong>
				<ul>
					<li><a href="https://www.flaticon.com/fr/icones-gratuites/etoile" title="étoile icônes"><img src="../img/icons/etoile.png">Étoile icônes créées par Gregor Cresnar - Flaticon</a></li>
					<li><a href="https://fr.freepik.com/icone/google_300221#fromView=family&page=1&position=0&uuid=faa17053-25d5-4c6d-a96c-1218342ec4f4"><img src="../img/icons/google.png" alt="icone google">Icône google de Freepik</a></li>
					<li><a href="https://fr.freepik.com/icone/facebook_174848#fromView=family&page=1&position=15&uuid=faa17053-25d5-4c6d-a96c-1218342ec4f4"><img src="../img/icons/facebook.png" alt="icone facebook">Icône facebook de Freepik</a></li>
					<li><a href="https://fr.freepik.com/icone/instagram_174855#fromView=family&page=1&position=0&uuid=faa17053-25d5-4c6d-a96c-1218342ec4f4"><img src="../img/icons/instagram.png" alt="icone instagram">Icône instagram de Freepik</a></li>
					<li><a href="https://www.flaticon.com/free-icons/grape" title="grape icons"><img src="../img/icons/grape.png">Grape icons created by Good Ware - Flaticon</a></li>
					<li><a href="https://fr.vecteezy.com/vecteur-libre/carte-afrique">Carte Afrique Vecteurs par Vecteezy</a></li>
					<li><a href="https://fr.vecteezy.com/vecteur-libre/carte-europe">Carte Europe Vecteurs par Vecteezy</a></li>
					<li><a href="https://fr.vecteezy.com/vecteur-libre/fronti%C3%A8re">Frontière Vecteurs par Vecteezy</a></li>
					<li><a href="https://fr.vecteezy.com/vecteur-libre/carte-australie">Carte Australie Vecteurs par Vecteezy</a></li>
					<li><a href="https://www.club-des-voyages.com/liban/situation.html">Carte du liban par club des voyages</a></li>
					<li><a href="https://fr.vecteezy.com/vecteur-libre/graphique">Graphique Vecteurs par Vecteezy</a></li>
				</ul>
			</div>
		</div>

		<div id="logo" class="center">
			<a href="../index.php"><img class="logo" src="../img/logo_bourvence.png" alt="logo Cave Bourvence" height="130" width="280"></a>
		</div>
	</main>

	<?php include('footer.php') ?>
</body>
</html>