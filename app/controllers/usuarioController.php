<?php
require_once 'app/models/Usuario.php';

class UsuarioController extends Controller {
	
	function index_action() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./usuario/usuario');
	}
	
	function logar() {
		if(empty($_POST)) {
			echo "erro";
		} else {
			$usuario = $_POST['user'];
			$pass = $_POST['pass'];
			
			$user = new Usuario();
			
			echo ($user->logar($usuario, $pass) ? "sucesso" : "falha");
		}
	}
	
	function deslogar() {
		$usuario = new Usuario();
		$usuario->deslogar();
		header("Location: /loot");
	}
	
	function panel() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else 
			$this->View('./usuario/usuario');
	}
	
	function cadastrar() {
		$this->View('./usuario/cadastrar');
	}
	
	function editar() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./usuario/editar');
	}
	
	function insert() {
		$branco = false;
		foreach ($_POST as $campo) {
			if(empty($campo)) {
				$branco = true;
				break;
			}
		}
		
		if($branco) {
			echo "empty";
		} else {
			$usuario = new Usuario();
			
			$usuario->setNome($_POST['txt-nome']);
			$usuario->setMail($_POST['txt-email']);
			$usuario->setNick($_POST['txt-nick']);
			$usuario->setSenha($_POST['txt-senha']);
	
			echo $usuario->insert();
		}
			  
	}
	
	function update() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$branco = false;
			foreach ($_POST as $campo) {
				if(empty($campo)) {
					$branco = true;
					break;
				}
			}
				
			if($branco) {
				echo "empty";
			} else {
				$usuario = Usuario::getById($_POST['txt-id']);
	
				$usuario->setNome($_POST['txt-nome']);
				$usuario->setMail($_POST['txt-email']);
				$usuario->setNick($_POST['txt-nick']);
				$usuario->setSenha($_POST['txt-senha']);
				$usuario->setAtivo(($_POST['txt-ativo'] == 1 ? 1 : 0));
				
				echo $usuario->update();
			}
		}	
	}
	
	function delete() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$id = $_POST['id'];
			
			$usuario = Usuario::getById($id);
			
			$usuario->delete();
		}
	}
	
	function getAll() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$usuario = new Usuario();
			
			$usuarios = $usuario->getAll();
			
			echo json_encode($usuarios);
	}
	
	function getById() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		
		$id = $_POST['id'];
			
		$user = Usuario::getById($id);

		$usuario['id'] = $user->getId();
		$usuario['nome'] = $user->getNome();
		$usuario['mail'] = $user->getMail();
		$usuario['nick'] = $user->getNick();
		$usuario['senha'] = $user->getSenha();
		$usuario['ativo'] = $user->getAtivo();
		
		echo json_encode($usuario);
	}
}