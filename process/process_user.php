<?php

// Vérification de l'identification permanente de l'utilisateur pour les pages de l'admin
if(!isset($_SESSION['user_login'])) {
	echo "Vous n'avez pas les droits requis pour cet page<br/>";
	echo "<a href='../index.php'>Retour vers le site</a>";
	exit;
}
$user_login = $_SESSION['user_login'];