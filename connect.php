<?php
require('config.php');
require('moteur_recherche/vendor/autoload.php');

$host = "mysql:host=". DBHOST .";dbname=". DBNAME;

// Connection à la base de données
try {
	$db = new PDO($host, DBUSER, DBPASS);
	$db->exec('SET NAMES utf8');
} catch (Exception $e) {
	echo 'Message erreur SQl' . $e->getMessage() . '<br>';
	exit;
}