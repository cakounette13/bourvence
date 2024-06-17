<?php
session_start();
require('../../connect.php');
require('../../class/UserManager.php');
require('../../class/ProductManager.php');
$dirname = dirname(__FILE__);
$basename = basename($dirname);
$filename = $basename ."/". basename(__FILE__);
require('../../process/process_user.php');
require('../../process/process_permiss.php');

$product = new ProductManager($db);

// Pagination
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) AND !empty($_GET['page'])) {
	$currentPage = (int) trim(htmlspecialchars($_GET['page']));
} else {
	$currentPage = 1;
}

$products = $product->getPageproduct($currentPage);
$pages = $product->getPages();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tous les produits</title>

	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
	<main class="container">
		<h1 class="center">Tous les produits</h1>
		<?php if(!empty($_SESSION['erreur'])): ?>
			<div class="alert alert-danger" role="alert">
				<?= $_SESSION['erreur'] ?>
				<?php $_SESSION['erreur'] = "" ?>
			</div>
		<?php endif ?>

		<?php if(!empty($_SESSION['success'])): ?>
			<div class="alert alert-success" role="alert">
				<?= $_SESSION['success'] ?>
				<?php $_SESSION['success'] = "" ?>
			</div>
		<?php endif ?>
		
		<a role="button" class="btn btn-xs btn-product" href="../menu.php">Retour à l'accueil Administrateur</a>
		<a role="button" class="btn btn-xs btn-product" href="../../index.php">Retour au site</a>
		<a role="button" class="btn btn-xs btn-product" href="insertProduct.php">Ajouter un produit</a>
		<div class="row">
			<table class="table table-striped">
				<thead>
					<th class="center">Id</th>
					<th class="center">nom</th>
					<th class="center">Description</th>
					<th class="center">Prix TTC</th>
					<th class="center" colspan="2">Actions</th>
				</thead>
				<tbody>
					<?php foreach($products as $product): ?>
						<tr>
							<td><?= $product['prod_id'] ?></td>
							<td><?= $product['prod_name'] ?></td>
							<td><?= $product['prod_desc'] ?></td>
							<td class="right"><?= number_format($product['prod_prix_ttc'], 2)?></td>
							<td>
								<a href="updateProduct.php?prod_id=<?= $product['prod_id'] ?>"><i class="bi bi-pencil-fill"></i></a>
							</td>
							<td>
								<a onclick="return(confirm('Attention! Vous allez supprimer un produit. Confirmez-vous la suppression ?'))" href="deleteProduct.php?prod_id=<?= $product['prod_id'] ?>"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<nav aria-label="Page navigation">
				<ul class="pagination pagination-sm flex-wrap">
					<li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
						<a href="?page=<?= $currentPage-1 ?>" class="page-link">Précédente</a>
					</li>
					<?php for($page = 1; $page <= $pages ; $page++): ?>
					<li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
						<a href="?page=<?= $page ?>" class="page-link "><?= $page ?></a>
					</li>
					<?php endfor ?>
					<li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
						<a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
					</li>
				</ul>
			</nav>
		</div>
	</main>
</body>
</html>