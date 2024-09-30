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

$user_id = $_SESSION['user_id'];

// Date et heure d'envoi du formulaire
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");

if(isset($_GET['post_id']) and !empty($_GET['post_id'])) {
	// données envoyées sécurisées
	$post = new PostManager($db);
	$post_id = (int) trim(htmlspecialchars($_GET['post_id']));
	$post = $post->getPost($post_id);
	if(!$post) {
		$_SESSION['error'] = "Id inexistant";
		//header('location:listPost.php');
	}
} else {
	$_SESSION['error'] = "URL invalide";
	//header('location:listPost.php');
}
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

<h1 class="center">Modification d'un post</h1>

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

<div class="container-fluid flex-wrap col-lg-12">
	<form action="../../process/process_post.php" method="POST" id="updatePost" enctype="multipart/form-data" class="col-lg-6 col-md-12">
		<div class="form-group row">
			<input class="col-lg-4 col-12" type="hidden" name="post_id" value="<?= $post[0]['post_id'] ?>">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="title">Titre du Post</label>
			<input class="col-lg-7 col-12" type="text" name="post_title" value="<?= $post[0]['post_title'] ?>" id="title">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="text">Texte du post</label>
			<textarea class="col-lg-7 col-12" type="textarea" name="post_text" rows="4" cols="20" id="text"><?= $post[0]['post_text'] ?></textarea>
		</div>
		<div class="form-group row">
			<input type="hidden" name="old_img" value="<?= $post[0]['post_img'] ?>">
			<img class="col-lg-7 col-12" src="../../img/posts/<?= $post[0]['post_img']?>" alt="<?= $post[0]['post_img'] ?>" width="50" height="50">		
		</div>
		<div class="form-group row">
			<input class="col-lg-7 col-12" type="file" name="new_img">
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="publie">Publié</label>
			<select class="col-lg-7 col-12" type="select" name="post_publie" id="publie">
				<?php if($post[0]['post_publie'] == 0) {
						echo '<option selected ="selected" value="0">Non</option>
						<option value="1">Oui</option>';			
					} else {
						echo '<option selected="selected" value="1">Oui</option>
						<option value="0">Non</option>';
					}
				?>			
			</select>			
		</div>
		<div class="form-group row">
			<input type="hidden" name="post_date" value="<?= $date ?>">
			<input type="hidden" name="user_id" value="<?= $user_id ?>">
		</div>
		<div class="col-sm-12 center">
			<input type="submit" name="submitUpdatePost" class="btn submit"> 
		</div>
	</form>
</div>
<div class="container center">
	<a role="button" class="btn btn-post" href="listPost.php">Retour à la liste</a>
	<a role="button" class="btn btn-post" href="../../index.php">Retour au site</a>
</div>