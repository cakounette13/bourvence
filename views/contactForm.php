<?php
// Date et heure d'envoi du formulaire
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");
?>

<div class="container-fluid col-lg-12 contact">
	<form action="../process/process_contact.php" method="POST" id="contactForm" class="col-lg-6 col-md-12">
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="name">nom</label>
			<input class="col-lg-7 col-12" type="text" name="contact_name" id="name" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="prenom">Prénom</label>
			<input class="col-lg-7 col-12" type="text" name="contact_prenom" id="prenom" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="email">Email</label>
			<input class="col-lg-7 col-12" type="email" name="contact_email" id="email" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4 col-12" for="message">Votre message</label>
			<textarea class="col-lg-7 col-12" type="textarea" name="contact_msg" id="message" placeholder="Veuiller saisir votre message" rows="5" required></textarea>
		</div>
		<input type="hidden" name="date_msg" value="<?= $date ?>">
		<div class="col-sm-12 center">
			<input type="submit" name="submitContactForm" class="btn submit">
		</div>
	</form>
</div>