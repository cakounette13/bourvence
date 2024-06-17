<?php
require('../connect.php');

// Indexation avec librairie TNTSearch
use TeamTNT\TNTSearch\TNTSearch;

$tnt = new TNTSearch;

$tnt->loadConfig([
	'driver' => 'mysql',
	'host' => DBHOST,
	'database' => DBNAME,
	'username' => DBUSER,
	'password' => DBPASS,
	'storage' => '.',
	'stemmer' => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class	
]);

$indexer = $tnt->createIndex('products.index');

$indexer->query('SELECT prod_id, prod_name, family_name, region_name, appell_name, frs_name FROM products P INNER JOIN families Fa ON (P.family_id = Fa.family_id) INNER JOIN regions R ON (P.region_id = R.region_id) INNER JOIN appellations A ON (P.appell_id = A.appell_id) INNER JOIN fournisseurs F ON (P.frs_id = F.frs_id)');
$indexer->setPrimaryKey('prod_id');
$indexer->includePrimaryKey();
$indexer->setLanguage('french');
$indexer->run();