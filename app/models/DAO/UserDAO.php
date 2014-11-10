<?php
require_once 'Doctrine.php';

class UserDAO {
	function logar($usuario, $senha) {
		
		$user = Doctrine::getEntityManager()->getRepository('Usuario')->findOneBy(array('nome' => $usuario, 'senha' => $senha));
		
		return (empty($user) ? false : $user);
	}
}
?>