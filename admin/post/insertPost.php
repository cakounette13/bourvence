<?php
session_start();
require('../../connect.php');
require('../../class/PostManager.php');
require('../../class/UserManager.php');
$dirname = dirname(__FILE__);
$basename = basename($dirname);
$filename = $basename ."/". basename(__FILE__);
require('../../process/process_user.php');
require('../../process/process_permiss.php');

$post = new PostManager($db);
$user = new UserManager($db);
$user_id = $_SESSION['user_id'];
$posts = $post->getPost($user_id);

// Date et heure d'envoi du formulaire
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cave Bourvence, Votre cave à vin</title>

	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<h1 class="center">Création d'un Post</h1>

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

<div class="container-fluid col-lg-12">
	<form action="../../process/process_post.php" method="POST" id="insertPost" enctype="multipart/form-data" class="col-lg-6 col-md-12">
		<div class="form-group row">
			<input class="col-lg-4 col-12" type="hidden" name="post_id">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="title">Titre du Post</label>
			<input class="col-lg-7 col-12" type="text" name="post_title" id="title" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="desc">Description du Post</label>
			<textarea class="col-lg-7 col-12" type="textarea" name="post_text" rows="8" cols="20" id="desc" required></textarea>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12"for="img">Image à télécharger</label>
			<input class="col-lg-7 col-12" type="file" name="new_img" id="img" required>
		</div>
		<div class="form-group row">
			<p>Post à publier</p>
			<div class="form-check">
				<input class="form-check_input" type="radio" name="post_publie" value="1" id="publie">
			</input>
				<label class="form_check_label" for="publie">Oui</label>
			</div>
			<div class="form-check">
				<input class="form-check_input" type="radio" name="post_publie" value="0" id="non_publie">
			</input>
				<label class="form_check_label" for="non_publie">non</label>
			</div>
			<input type="hidden" name="post_date" value="<?= $date ?>">
			<input type="hidden" name="user_id" value="<?= $user_id ?>">
		</div>
		<div class="col-sm-12 center">
			<input type="submit" name="submitInsertPost" class="btn submit">
		</div>
	</form>	
</div>
<div class="container center">
	<a role="button" class="btn btn-xs btn-product" href="../menu.php">Retour à l'accueil Administrateur</a>
	<a role="button" class="btn btn-xs btn-product" href="listPost.php">Retour à la liste</a>
	<a role="button" class="btn btn-xs btn-product" href="../../index.php">Retour au site</a>
</div>