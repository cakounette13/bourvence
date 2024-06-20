<?php
require('class/PostManager.php');

$post = new PostManager($db);
$posts = $post->getPost();
?>
// Carousel se trouvant sous la barre de navigation
<header id="container-fluid">
	<div id="carouselFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php foreach ($posts as $post): ?>
				<?php if($post['post_publie'] == 1): ?>
					<div class="carousel-item bg-body active">
						<div class="carousel-text">
							<h2 class="center"><?= $post['post_title'] ?></h2>
							<p><?= $post['post_text']?></p>
						</div>
						<div class="carousel-img">
							<img class="d-block" src="img/posts/<?= $post['post_img']?>" alt="$post['post_title']">
						</div>									
					</div>
				<?php endif ?>
			<?php endforeach ?>		
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</header>