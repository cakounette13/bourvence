<?php
// Enregistrement des erreurs dans un fichier log (mettre à 0 en production)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
// Chemin du fichier qui enregistre les logs
ini_set('error_log', 'admin/log_error_php.txt');

// Données de connexion à base de données
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME','db_bourvence');


define('WEB_DIR_NAME', 'bourvence');
define('WEB_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] . "/" . WEB_DIR_NAME);
define('IMAGE_DIR_NAME', 'img');
define('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] . "/" . WEB_DIR_NAME . "/" . IMAGE_DIR_NAME);

define('WEB_DIR_MAIL', 'cavebourvence@gmail.com');