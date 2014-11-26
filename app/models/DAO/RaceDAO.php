<?php
require_once 'Doctrine.php';
require_once 'app/models/Race.php';
class RaceDAO {
	static function getAll() {
		$races = Doctrine::getEntityManager()->getRepository('Race')->findAll();
	
		return (empty($races) ? false : $races);
	}
	
	static function getById($id) {
		$race = Doctrine::getEntityManager()->getRepository('Race')->find(array('id' => $id));
	
		return (empty($race) ? false : $race);
	}
}
