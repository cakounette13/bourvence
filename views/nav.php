<?php
$products = new ProductManager($db);
$families = $products->getFamily();
$regions = $products->getRegion();
$colors = $products->getColorFamily();

?>

<header id="container-fluid">
	<nav class="navbar navbar-expand-lg">
		<div id="logo">
			<a href="/bourvence/index.php"><img class="logo" src="/bourvence/img/logo_bourvence.png" alt="logo Cave Bourvence" height="130" width="280"></a>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
			<form action="/bourvence/process/process_search.php" method="POST" class="search" id="searchForm">
				<input type="search" id="search" name="q" placeholder="Rechercher...">
			</form>

			<ul class="navbar-nav justify-content-end flex-wrap">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos vins</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach($families as $family_id => $family) {
							if(strpos($family['family_name'],"Vins") !== false) {
								echo '<a class="dropdown-item" id="'. $family['family_id'] .'" href="/bourvence/views/products.php?family_id='.$family['family_id'] .'">'. $family['family_name'] . '</a>';
							}
							if(strpos($family['family_name'],"Bag") !== false) {
								echo '<a class="dropdown-item" id="'. $family['family_id'] .'" href="/bourvence/views/products.php?family_id='.$family['family_id'] .'">'. $family['family_name'] . '</a>';
							}
						} ?>
						
						<a class="dropdown-item" id="" href="/bourvence/views/strangers.php">Vins Etrangers</a>
						<a class="dropdown-item" id="" href="/bourvence/views/regions.php">Par Région</a>
						<a class="dropdown-item" id="" href="#">Par Domaine</a>
					</div>
					
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos Bulles</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach($families as $family_id => $family) {
							if(strpos($family['family_name'],"Champagnes") !== false) {
								echo '<a class="dropdown-item" id="'. $family['family_id'] .'" href="/bourvence/views/products.php?family_id='.$family['family_id'] .'">'. $family['family_name'] . '</a>';
							}
							if(strpos($family['family_name'],"Cidres") !== false) {
								echo '<a class="dropdown-item" id="'. $family['family_id'] .'" href="/bourvence/views/products.php?family_id='.$family['family_id'] .'">'. $family['family_name'] . '</a>';
							}
							if(strpos($family['family_name'],"Effervescents") !== false) {
								echo '<a class="dropdown-item" id="'. $family['family_id'] .'" href="/bourvence/views/products.php?family_id='.$family['family_id'] .'">'. $family['family_name'] . '</a>';
							}
						} ?>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<?php foreach($families as $family_id => $family): ?>
						<?php if(strpos($family['family_name'],"Spiritueux") !== false): ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown <?= $family['family_id'] ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos <?= $family['family_name'] ?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach($regions as $region): ?>
									<?php if($region['family_id'] === $family['family_id']): ?>
										<a class="dropdown-item" href="/bourvence/views/products.php?family_id=<?= $family['family_id'] ?>&region_id=<?= $region['region_id']?>" id="<?= $region['region_id']?>"><?= $region['region_name']?></a>
									<?php endif ?>
								<?php endforeach ?>	
							</div>
						<?php endif ?>		
					<?php endforeach ?>
				</li>
				<li class="nav-item dropdown">
					<?php foreach($families as $family_id => $family): ?>
						<?php if(strpos($family['family_name'],"Bières") !== false): ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown <?= $family['family_id']?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos <?= $family['family_name']?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach($colors as $color): ?>
									<?php if($color['family_id'] === $family['family_id']): ?>
										<a class="dropdown-item" href="/bourvence/views/products.php?family_id=<?= $family['family_id'] ?>&color_id=<?= $color['color_id'] ?>" id="<?= $color['color_id']?>"><?= $color['color_name'] ?></a>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						<?php endif ?>		
					<?php endforeach ?>
				</li>
				<li class="nav-item dropdown">
					<?php foreach($families as $family_id => $family): ?>
						<?php if(strpos($family['family_name'],"Alimentation") !== false): ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown <?= $family['family_id'] ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">Notre Epicerie Fine</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach($regions as $region): ?>
									<?php if($region['family_id'] === $family['family_id']): ?>
										<a class="dropdown-item" href="/bourvence/views/products.php?family_id=<?= $family['family_id'] ?>&region_id=<?= $region['region_id']?>" id="<?= $region['region_id']?>"><?= $region['region_name']?></a>
									<?php endif ?>
								<?php endforeach ?>	
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</li>
				<li class="nav-item dropdown">
					<?php foreach($families as $family_id => $family): ?>
						<?php if(strpos($family['family_name'],"Accessoires") !== false): ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown <?= $family['family_id'] ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos <?= $family['family_name'] ?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach($regions as $region): ?>
									<?php if($region['family_id'] === $family['family_id']): ?>
										<?php if(strpos($region['region_name'],"Non définie") !== false): ?>
											<a class="dropdown-item" href="/bourvence/views/products.php?family_id=<?= $family['family_id'] ?>&region_id=<?= $region['region_id']?>" id="<?= $region['family_id']?>">Divers</a>
										<?php else : ?>
										<a class="dropdown-item" href="/bourvence/views/products.php?family_id=<?= $family['family_id'] ?>&region_id=<?= $region['region_id']?>" id="<?= $region['region_id']?>"><?= $region['region_name']?></a>
										<?php endif ?>
									<?php endif ?>
								<?php endforeach ?>	
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/bourvence/views/contact.php">Contact</a>
				</li>
				
			</ul>
		</div>
	</nav>
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
</header>