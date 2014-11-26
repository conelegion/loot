<?php
require_once 'Doctrine.php';
require_once 'app/models/Spec.php';
class SpecDAO {
	static function getAll() {
		$specs = Doctrine::getEntityManager()->getRepository('Spec')->findAll();
	
		return (empty($specs) ? false : $specs);
	}
	
	static function getByClasse($classe) {
		$query = Doctrine::getEntityManager()->createQuery("SELECT s FROM Spec s WHERE s.class = ".$classe);
		$specs = $query->getResult();
		
		return (empty($specs) ? false : $specs);
	}
	
	static function getById($id) {
		$spec = Doctrine::getEntityManager()->getRepository('Spec')->find(array('id' => $id));
	
		return (empty($spec) ? false : $spec);
	}
}
