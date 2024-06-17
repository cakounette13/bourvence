<?php
require('class/UserManager.php');

if(isset($_POST['submitLoginForm'])) {
	if(isset($_POST['user_login']) AND (isset($_POST['user_mdp']))) {
		// Récupération des données du formulaire
		$user_login = trim(htmlspecialchars($_POST['user_login']));
		$user_mdp = trim(htmlspecialchars($_POST['user_mdp']));
		// Vérification longueur des valeurs postées
		$login_length = strlen($user_login);
		$mdp_length = strlen($user_mdp);
		if($login_length > 20 OR $mdp_length > 20) {
			$msg_error = "Longueur invalide";
		} else {
			// Vérification des caractères autorisés
			$autorized_caract = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '?', '@','-', ',', ';', '/', '#', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
			$login_error = 0;
			for($i = 0; $i < $login_length; $i++) {
				if(!in_array($user_login[$i], $autorized_caract)) {
					$login_error++;
				}
			}
			$mdp_error = 0;
			for($i = 0; $i < $mdp_length; $i++) {
				if(!in_array($user_mdp[$i], $autorized_caract)) {
					$mdp_error++;
				}
			}
		}
		$user_mdp = md5($user_mdp);
		// Instanciation classe UserManager
		$userManager = new UserManager($db);
		// Authentification utilisateur
		$autUser = $userManager->authUser($user_login, $user_mdp);
		if ($autUser['count'] == 0 ) {
			$msg_error = "Cet accès n'existe pas.";
		} else {
			session_start();
			$_SESSION['user_id'] = $autUser['user_id'];
			$_SESSION['user_login'] = $user_login;
			$_SESSION['role_level'] = $autUser['role_level'];
			header('location:admin/menu.php');
		}
	} else {
		$msg_error = "Votre saisie n'est pas valide. Veuillez recommencer";
	}
}