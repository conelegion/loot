<?php
require_once 'Doctrine.php';
require_once 'app/models/Spec.php';
class SpecDAO {
	static function getAll() {
		$specs = Doctrine::getEntityManager()->getRepository('Spec')->findAll();
	
		return (empty($specs) ? false : $specs);
	}
}
