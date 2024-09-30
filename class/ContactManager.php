<?php

class ContactManager {

	private $_db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function setDb(PDO $dbh) {
		$this->_db = $dbh;
	}

	public function insertContact(Contact $contact) {
		$sql = "INSERT INTO contacts (contact_id, contact_name, contact_prenom, contact_email, contact_msg, date_msg) VALUES (:contact_id, :contact_name, :contact_prenom, :contact_email, :contact_msg, :date_msg)";
		$stmt = $this->_db->prepare($sql);
		$contact_id = (int) trim(htmlspecialchars($contact->getContact_id()));
		$contact_name = trim(htmlspecialchars($contact->getContact_name()));
		$contact_prenom = trim(htmlspecialchars($contact->getContact_prenom()));
		$contact_email = trim(htmlspecialchars($contact->getContact_email()));
		$contact_msg = trim(htmlspecialchars($contact->getContact_msg()));
		$date_msg = trim(htmlspecialchars($contact->getDate_msg()));
		$stmt->bindparam(':contact_id', $contact_id);
		$stmt->bindparam(':contact_name', $contact_name);
		$stmt->bindparam(':contact_prenom', $contact_prenom);
		$stmt->bindparam(':contact_email', $contact_email);
		$stmt->bindparam(':contact_msg', $contact_msg);
		$stmt->bindparam(':date_msg', $date_msg);
		$stmt->execute();
	}

	public function getNbContact() {
		$sql = "SELECT count(*) AS nb_contact FROM contacts";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
}