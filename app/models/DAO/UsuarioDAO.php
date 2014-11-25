<?php
require_once 'Doctrine.php';
require_once 'app/models/Usuario.php';

class UsuarioDAO {
	function logar($usuario, $senha) {
		
		$user = Doctrine::getEntityManager()->getRepository('Usuario')->findOneBy(array('nome' => $usuario, 'senha' => $senha));
		
		return (empty($user) ? false : $user);
	}
	
	function getAll() {
		$users = Doctrine::getEntityManager()->getRepository('Usuario')->findAll();

		return (empty($users) ? false : $users);
	}
	
	static function getById($id) {
		$user = Doctrine::getEntityManager()->getRepository('Usuario')->find(array('id' => $id));
	
		return (empty($user) ? false : $user);
	}
	
	function insert($usuario) {			
		Doctrine::getEntityManager()->persist($usuario);
		return Doctrine::getEntityManager()->flush();
	}
	
	function update($usuario) {
		Doctrine::getEntityManager()->persist($usuario);
		return Doctrine::getEntityManager()->flush();
	}
	
	function delete($usuario) {
		Doctrine::getEntityManager()->remove($usuario);
		return Doctrine::getEntityManager()->flush();
	}
}
?>