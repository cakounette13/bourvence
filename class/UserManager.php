<?php

class UserManager {
	private $_db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function setDb(PDO $dbh) {
		$this->_db = $dbh;
	}

	public function authUser($user_login, $user_mdp) {
		$sql = 'SELECT COUNT(user_id) as count, user_id, R.role_level, user_mdp FROM users U INNER JOIN roles R ON (U.role_id = R.role_id) WHERE user_login = :user_login';
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':user_login',$user_login);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$passwordHash = $row['user_mdp'];
		var_dump($passwordHash);
		var_dump($user_mdp);
		var_dump(password_verify($user_mdp, $passwordHash));
		if(password_verify($user_mdp, $passwordHash)) {
			$user_data['count'] = $row['count'];
			$user_data['user_id'] = $row['user_id'];
			$user_data['user_login'] = $user_login;
			$user_data['user_mdp'] = $user_mdp;
			$user_data['role_level'] = $row['role_level'];
			var_dump($user_data);
			return $user_data;
		}

		
	}

	// Restriction de l'affichage du menu en fonction des autorisations
	public function displayMenu($role_level) {
		$sql = "SELECT action_name, action_slug FROM actions A INNER JOIN permiss P ON (A.action_id = P.action_id AND min_level <= :role_level)";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':role_level', $role_level);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		if(isset($result)) {
			return $result;
		} else {
			return false;
		}
	}

	public function checkUserPermiss($role_level, $action_slug) {
		$sql = "SELECT P.min_level, P.action_id FROM permiss P INNER JOIN actions A ON (A.action_slug = :action_slug AND P.action_id = A.action_id)";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindparam(':action_slug', $action_slug);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['min_level'] > $role_level) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}