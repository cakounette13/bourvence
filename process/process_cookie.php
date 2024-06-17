<?php

$stats = new StatManager($db);

// Si le cookie existe
if(isset($_COOKIE['visite'])) {
	// Valeur du cookie
	$cookie_value = $_COOKIE['visite'];
	$cookie_values = unserialize($cookie_value);
	$web_user_id = $cookie_values->getWeb_user_id('web_user_id');
	$web_user_visit = $cookie_values->getWeb_user_visit('web_user_visit');
	// Mise à jour du nombre de visites
	$web_user_visit = $cookie_values->setWeb_user_visit($web_user_visit+1);
	// sérialisation pour enregistrer les données dans le cookie
	$stat_data = serialize($cookie_values);
	$stat_data = unserialize($stat_data);
	// Mise à jour dans la base du nombre de visite pour cet internaute
	$stats->updateStat($stat_data);
} else {
	// Le cookie n'existe pas
	$web_user_id = uniqid();
	$nombre_visite = 1;
	$user_stat['web_user_id'] = $web_user_id;
	$user_stat['web_user_visit'] = $nombre_visite;
	$stat_data = serialize($user_stat);
	$stat_data = new Stat($user_stat);
	// ajout dans la base du nombre de visite pour cet internaute
	$stats->insertStat($stat_data);
}
$result = serialize($stat_data);
// envoi du cookie
setcookie('visite', $result, time() + 365*24*3600);
?>
