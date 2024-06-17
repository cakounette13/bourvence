<?php

// Sélection menu selon utilisateur
$user = new UserManager($db);
$menu = $user->displayMenu($_SESSION['role_level']);
return $menu;

// Permissions sur les pages admin
$action_slug = substr($filename, 0, -4);
$user = new UserManager($db);

$userPermiss = $user->checkUserPermiss($_SESSION['role_level'], $action_slug);

if($userPermiss == false) {
	echo "Cette page n'existe pas.";
	exit;
}