<?php

class Stat {
	protected $stat_id, $web_user_id, $web_user_visit;

	public function __construct(array $data) {
		if(isset($data['stat_id'])) {
			$this->setStat_id($data['stat_id']);
		}
		$this->setWeb_user_id($data['web_user_id']);
		$this->setWeb_user_visit($data['web_user_visit']);
	}

	// Setters
	public function setStat_id($stat_id) {
		if(is_int($stat_id)) {
			$this->stat_id = $stat_id;
		}
	}

	public function setWeb_user_id($web_user_id) {
		if(is_string($web_user_id)) {
			$this->web_user_id = $web_user_id;
		}
	}

	public function setWeb_user_visit($web_user_visit) {
		if(is_numeric($web_user_visit)) {
			$this->web_user_visit = $web_user_visit;
		}
	}

	// Getters
	public function getStat_id() {
		return $this->stat_id;
	}

	public function getWeb_user_id() {
		return $this->web_user_id;
	}

	public function getWeb_user_visit() {
		return $this->web_user_visit;
	}
}