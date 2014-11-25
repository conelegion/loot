<?php
require_once 'Doctrine.php';
require_once 'app/models/Classe.php';
class ClasseDAO {
	static function getAll() {
		$classes = Doctrine::getEntityManager()->getRepository('Classe')->findAll();
	
		return (empty($classes) ? false : $classes);
	}
}
