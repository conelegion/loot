<?php
class CharacterDAO {
	function insert($char) {
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
	
	function delete($character) {
		Doctrine::getEntityManager()->remove($character);
		return Doctrine::getEntityManager()->flush();
	}
}

?>