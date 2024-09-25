<?php
session_start();
require('connect.php');
if(isset($_SESSION['user_login']))
header('location:admin/menu.php');

require('process/process_auth.php');

$mdp = "0107";
$hash = password_hash($mdp, PASSWORD_DEFAULT);
var_dump($mdp);
var_dump($hash);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Page login du site de la Cave Bourvence">
	<title>Cave Bourvence, Votre cave à vin</title>

	<link rel="stylesheet" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script type="text/javascript" src="js/app.js"></script>
</head>

<h1 class="center">Connexion</h1>

<?php if(isset($msg_error)): ?>
	<p class="center"><?php echo $msg_error; ?></p>
<?php endif; ?>

<form action="" method="POST" id="loginForm">
	<div class="form-group row">
		<label for="login" class="col-sm-4 col-form-label">Login :</label>
		<div class="col-sm-6">
			<input type="text" name="user_login" id="login" class="form-control" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="mdp" class="col-sm-4 col-form-label">Mot de passe :</label>
		<div class="col-sm-6">
			<input type="password" name="user_mdp" id="mdp" class="form-control" required>
		</div>
	</div>
	<div class="col-sm-12 center">
		<input type="submit" name="submitLoginForm" class="btn submit">
	</div>
</form>