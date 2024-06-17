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

$posts = $post->getPost();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tous les posts</title>

	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
	<main class="container">
		<h1 class="center">Tous les posts</h1>
		
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
		
		<a role="button" class="btn btn-xs btn-product" href="../menu.php">Retour à l'accueil Administrateur</a>
		<a role="button" class="btn btn-xs btn-product" href="../../index.php">Retour au site</a>
		<a role="button" class="btn btn-xs btn-product" href="insertPost.php">Ajouter un post</a>
		<div class="row">
			<table class="table table-striped">
				<thead>
					<th class="center">Titre</th>
					<th class="center">Texte</th>
					<th class="center">Image</th>
					<th class="center">Publié</th>
					<th class="center">Date création</th>
					<th class="center">Créé par</th>
					<th class="center" colspan="2">Actions</th>
				</thead>
				<tbody>
					<?php foreach($posts as $post): ?>
						<tr>
							<td><?= $post['post_title'] ?></td>
							<td><?= $post['post_text'] ?></td>
							<td><?= $post['post_img'] ?></td>
							<td>
								<?php if($post['post_publie'] == 1) {
									echo "Oui";
								} else {
									echo "Non";
								}
								?>
							</td>
							<td>
								<?php $date = new DateTimeImmutable($post['post_date']);
								echo $date->format('d-m-y') ?>
							</td>
							<td>
								<?= ucfirst(strtolower($post['user_login'])) ?>
							</td>
							<td>
								<a href="updatePost.php?post_id=<?= $post['post_id']?>"><i class="bi bi-pencil-fill"></i></a>
							</td>
							<td>
								<a onclick="return(confirm('Attention! Vous allez supprimer un post. Confirmez-vous la suppression ?'))" href="deletePost.php?post_id=<?= $post['post_id'] ?>&post_img=<?= $post['post_img'] ?>"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>
</body>
</html>