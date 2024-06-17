<?php
session_start();
require('../connect.php');
require('../class/UserManager.php');
$filename = basename(__FILE__);
require('../process/process_user.php');
require('../process/process_permiss.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cave Bourvence, Votre cave à vin</title>

	<link rel="stylesheet" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<h1 class="center">Espace de Gestion</h1>
<div class="gestion">
	<div class="container col-lg-12">
		<h2>Menu profil : <?= ucfirst(strtolower($_SESSION['user_login'])) ?></h2>
		<?php foreach($menu as $menu_item): ?>
			<ul class="menu">
				<li class="pastille"><a title="<?= $menu_item['action_name']?>" href="<?= $menu_item['action_slug']?>.php"><?= $menu_item['action_name']?></a></li>
			</ul>
		<?php endforeach ?>
	</div>
	
	
	<div class="container center">
		<a title="retour sur le site Cave Bourvence" role="button" class="btn btn-xs btn-product" href="../index.php">Retourner sur le site</a>
		<a title="retour sur le site Cave Bourvence" role="button" class="btn btn-xs btn-product" href="logout.php">Se déconnecter</a>
	</div>
	
</div>