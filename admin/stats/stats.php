<?php
session_start();
require('../../connect.php');
require('../../class/StatManager.php');
require('../../class/UserManager.php');
$dirname = dirname(__FILE__);
$basename = basename($dirname);
$filename = $basename ."/". basename(__FILE__);
require('../../process/process_user.php');
require('../../process/process_permiss.php');

$stats = new StatManager($db);
$stat = $stats->getStats();
$nbrVisites = $stats->getNbrVisit();
$nbrVisiteurs = $stats->getNbrVisiteurs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Statistiques Cave Bourvence</title>

	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
	<h1 class="center">Statistiques Cave Bourvence</h1>
	<div class="container-fluid">
		<div class="row">
			<p>Nbr de visites :</p><p><?= $nbrVisites ?></p><br/>
		</div>
		<div class="row">
			<p>Nbr de visiteurs :</p><p><?= $nbrVisiteurs ?> </p>
		</div>
	</div>
	
	<div class="container center">
		<a role="button" class="btn btn-xs btn-product" href="../menu.php">Retour à l'accueil Administrateur</a>
		<a title="retour sur le site Cave Bourvence" role="button" class="btn btn-xs btn-product" href="../../index.php">Retourner sur le site</a>
		<a title="retour sur le site Cave Bourvence" role="button" class="btn btn-xs btn-product" href="../logout.php">Se déconnecter</a>
	</div>
</body>
</html>