<?php
class RaidDAO {
	static function getById($id) {
		$raid = Doctrine::getEntityManager()->getRepository('Raid')->find(array('id' => $id));
	
		return (empty($raid) ? false : $raid);
	}
}

?>