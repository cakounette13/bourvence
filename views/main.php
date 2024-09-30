<?php
$products = new ProductManager($db);
$domaines = $products->getDomaine();
?>

<main>
	<img class="etoile" src="img/icons/etoile.png"><h2>Nos domaines à l'affiche</h2>
	
	<div class="d-grid text-center gap-2 d-md-block">
		<?php foreach ($domaines as $domaine): ?>
			<a role="button" class="btn btn-bloc g-col-md-6" href="/bourvence/views/domaine.php?frs_id=<?= $domaine['frs_id'] ?>"><?= $domaine['frs_name'] ?></a>
		<?php endforeach ?>
	</div>
	<div class="d-grid text-center gap-2 d-md-block">
		<a role="button" class="btn btn-bloc g-col-md-6" href="/bourvence/views/domaines.php">Tous les domaines</a>
	</div>

	<img class="etoile" src="img/icons/etoile.png"><h2>Notre Magasin</h2>

	<div class="container localisation">
		<div class="row">
			<div class="col col-lg-7 map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5803.6576387225205!2d5.45344!3d43.338771!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9be3e91c9dd4d%3A0xd834d0a15c0d6ba4!2sCave%20Bourvence!5e0!3m2!1sfr!2sfr!4v1717497878469!5m2!1sfr!2sfr"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
				
			<div class="col col-lg-5">
				<div class="row coord">
					<h3>Adresse :</h3>
					<p>
						37, Avenue Louis Enjolras<br/>
						13380 Plan de Cuques
					</p>
				</div>
				<div class="row coord">
					<h3>Tél :</h3>
					<p>04.91.07.29.19</p>
				</div>
				<div class="row coord">
					<h3>Email :</h3>
					<p>cavebourvence@gmail.com</p>
				</div>
				<div class="row coord">
					<h3>Horaires :</h3>
					<p>
						Lundi: Fermé<br/>
						Du Mardi au samedi: 9h30 - 12h30 / 15h30 - 19h30<br/>
						Dimanche: Fermé.
					</p>
				</div>
				<div class="reseaux">
					<a href="https://maps.app.goo.gl/YGfRzdA7VxHBRwYy9"><img src="img/icons/google.png" alt="icone google"></a>
					<a href="https://www.facebook.com/bourvence/?locale=fr_FR"><img src="img/icons/facebook.png" alt="icone facebook"></a>
					<a href="https://www.instagram.com/cave_bourvence"><img src="img/icons/instagram.png" alt="icone instagram"></a>
				</div>
			</div>
		</div>
	</div>
</main>