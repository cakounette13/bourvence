<?php

class StatManager {

	private $_db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function setDb(PDO $dbh) {
		$this->_db = $dbh;
	}

	// On insère une stat de cookie
	public function insertStat(Stat $stat) {
		$sql = "INSERT INTO stats (web_user_id, web_user_visit) VALUES (:web_user_id, :web_user_visit)";
		$stmt = $this->_db->prepare($sql);
		$web_user_id = trim(htmlspecialchars($stat->getWeb_user_id()));
		$web_user_visit = trim(htmlspecialchars($stat->getWeb_user_visit()));
		$stmt->bindparam(':web_user_id', $web_user_id);
		$stmt->bindparam('web_user_visit', $web_user_visit);
		$stmt->execute();
	}

	// Mise à jour d'une stat pour un cookie
	public function updateStat(Stat $stat) {
		$sql = 'UPDATE stats SET web_user_visit = :web_user_visit WHERE web_user_id = :web_user_id';
		$stmt = $this->_db->prepare($sql);
		$web_user_id = trim(htmlspecialchars($stat->getWeb_user_id()));
		$web_user_visit = trim(htmlspecialchars($stat->getWeb_user_visit()));
		$stmt->bindparam(':web_user_id', $web_user_id);
		$stmt->bindparam(':web_user_visit', $web_user_visit);
		$stmt->execute();
	}

	// On récupère toutes les stats
	public function getStats() {
		$sql = 'SELECT stat_id, web_user_id, web_user_visit FROM stats ORDER BY web_user_visit DESC';
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	// Calcul du nombre total de visites
	public function getnbrVisit() {
		$sql = 'SELECT SUM(web_user_visit) AS total_visites FROM stats';
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$total_visites = $result['total_visites'];
		return $total_visites;
	}
	
	// calcul du nombre total de visiteurs
	public function getNbrVisiteurs() {
		$sql ='SELECT COUNT(web_user_id) AS total_visiteurs FROM stats';
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$total_visiteurs = $result['total_visiteurs'];
		return $total_visiteurs;
	}
}