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
	<meta name="description" content="Déclaration d'accessibilité du site cavebourvence.fr">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Déclaration d'accessibilité</title>

	<link rel="stylesheet" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="tarteaucitron/tarteaucitron.js"></script>
	<script type="text/javascript" src="js/cookies.js"></script>
	<!--<script type="text/javascript" src="js/modal.js"></script> En attendant que cela fonctionne-->
		
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z36N7G2D2K"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-Z36N7G2D2K');
	</script>
</head>

<body class="politique">
	<header>
		<h1>
			Déclaration d'accessibilité du site 
		</h1>
			<h2>cavebourvence.fr</h2>
	</header>
	<main>
		<article>
			<h3>Déclaration d'engagement</h3>
				<p>
					La Cave Bourvence s’engage à rendre son site Internet accessible conformément à l’article 47 de la loi n°2005-102 du 11 février 2005.
				</p>
				<p>À cette fin, la Cave Bourvence met en œuvre la stratégie et les actions suivantes :</p>
				<ul>
					<li>Réaliser annuellement un audit RGAA sur son site Internet</li>
					<li>Former ses collaborateurs aux dernières normes d'accessibilité numerique</li>
					<li>Cette déclaration d’accessibilité s’applique au site Internet : cavebourvence.fr</li>
				</ul>
		</article>
		<article>
			<h3>État de conformité</h3>
			<p>
				cavebourvence.fr est presque totalment conforme avec le référentiel général d’amélioration de l’accessibilité (RGAA), version 4 en raison des non-conformités et des dérogations énumérées ci-dessous.
			</p>
		</article>
		<article>
			<h3>Résultats des tests</h3>
			<p>L’audit de conformité réalisé par la Cave Bourvence révèle que : 99% des critères du RGAA version 4 sont respectés.</p>
		</article>
		<article>
			<h3>Contenus non accessibles en AAA</h3>
			<p>Flèches dans le carrousel en page d'accueil</p>
			<p>Pop-up Citron "Tarte au citron"</p>
		</article>
		<article>
			<h3>Établissement de cette déclaration d’accessibilité</h3>
			<p>Cette déclaration a été établie le 3 juillet 2024.</p>
		</article>
		<article>
			<h3>Technologies utilisées pour la réalisation du site</h3>
			<ul>
				<li>HTML 5</li>
				<li>CSS 3</li>
				<li>Bootstrap 5.3.3</li>
				<li>Tarte au citron</li>
				<li>Google Tag Manager</li>
				<li>TNTSearch</li>
			</ul>
		</article>
		<article>
			<h3>Environnement de test</h3>
			<p>Les vérifications de restitution de contenus ont été réalisées sur la base de la combinaison fournie par la base de référence du RGAA, avec les versions suivantes :</p>
			<ul>
				<li>Google Chrome Version Version 126.0.6478.63 (Build officiel) (64 bits)</li>
				<li>Firefox 127.0.1 (64 bits</li>
			</ul>
		</article>
		<article>
			<h3>Outils pour évaluer l’accessibilité</h3>
			<ul>
				<li>Inspecteur de code Google Chrome et Firefox</li>
				<li>Extension Google Chrome : Lighthouse</li>
				<li>Extension Google Chrome : Axe DevTools v 4.55.0</li>
				<li>Extension Google Chrome : VCAG Contrast checker</li>
				<li>Extension Google Chrome : Headings Map</li>
			</ul>
		</article>
		<article>
			<h3>Pages du site ayant fait l’objet de la vérification de conformité</h3>
			<p>Page d’accueil : <a href="../index.php">cavebourvence.fr</a></p>
			<p>Page de contact : <a href="/bourvence/views/contact.php">cavebourvence.fr/views/contact</a></p>
			<p>Page de déclaration d'accessibilité : <a href="/bourvence/views/accessibility.php">cavebourvence.fr/views/accessibility</a></p>
			<p>Page de groupement des produits : <a href="/bourvence/views/products.php">cavebourvence.fr/views/products</a></p>
			<p>Page de groupement des vins étrangers : <a href="/bourvence/views/strangers.php">cavebourvence.fr/views/strangers</a></p>
			<p>Page de groupement des régions : <a href="/bourvence/views/regions.php">cavebourvence.fr/views/regions</a></p>
			<p>Page de groupement des domaines : <a href="/bourvence/views/domaines.php">cavebourvence.fr/views/domaines</a></p>
		</article>
		<article>
			<h3>Retour d’information et contact</h3>
			<p>Si vous n’arrivez pas à accéder à un contenu ou à un service, vous pouvez contacter le responsable de cavebourvence.fr pour être orienté vers une alternative accessible ou obtenir le contenu sous une autre forme.</p>
			<p>Envoyer un message à l'adresse <a href="mailto:cavebourvence@gmail.com">cavebourvence@gmail.com</a></p>
		</article>
		<article>
			<h3>Voies de recours</h3>
			<p>Si vous constatez un défaut d’accessibilité vous empêchant d’accéder à un contenu ou une fonctionnalité du site, que vous nous le signalez et que vous ne parvenez pas à obtenir une réponse de notre part, vous êtes en droit de faire parvenir vos doléances ou une demande de saisine au Défenseur des droits.</p>
			<p>Plusieurs moyens sont à votre disposition :</p>
			<ul>
				<li>Écrire un message au Défenseur des droits</li>
				<li>Contacter le délégué du Défenseur des droits dans votre région</li>
				<li>Envoyer un courrier par la poste (gratuit, ne pas mettre de timbre) Défenseur des droits Libre réponse 71120 75342 Paris CEDEX 07.</li>
			</ul>
		</article>
	</main>	
</body>
</html>