<?php
class CharacterDAO {
	function insert($char) {
		Doctrine::getEntityManager()->persist($char);
		return Doctrine::getEntityManager()->flush();
	}
	
	function update($char) {
		Doctrine::getEntityManager()->persist($char);
		return Doctrine::getEntityManager()->flush();
	}
	
	static function getById($id) {
		$char = Doctrine::getEntityManager()->getRepository('Character')->find(array('id' => $id));
	
		return (empty($char) ? false : $char);
	}
	
	function getAll() {
		$chars = Doctrine::getEntityManager()->getRepository('Character')->findAll();
	
		return (empty($chars) ? false : $chars);
	}
	
	function getByRaid() {
		$raid = 1;
		$query = Doctrine::getEntityManager()->createQuery("SELECT s FROM Character s WHERE s.raid = ".$raid);
		$chars = $query->getResult();
	
		return (empty($chars) ? false : $chars);
	}
	
	function getFreeChars() {
		$raid = 0;
		$query = Doctrine::getEntityManager()->createQuery("SELECT s FROM Character s WHERE s.raid = ".$raid);
		$chars = $query->getResult();
	
		return (empty($chars) ? false : $chars);
	}
	
	function delete($character) {
		Doctrine::getEntityManager()->remove($character);
		return Doctrine::getEntityManager()->flush();
	}
}

?>