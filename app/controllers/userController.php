<?php
require_once 'app/models/Usuario.php';

class User extends Controller {
	
	function index_action() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('user');
	}
	
	function logar() {
		if(empty($_POST)) {
			echo "erro";
		} else {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			
			$usuario = new Usuario();
			
			$usuario->logar($user, $pass);
		}
	}
	
	function deslogar() {
		$usuario = new Usuario();
		$usuario->deslogar();
		header("Location: /loot");
	}
}

?>