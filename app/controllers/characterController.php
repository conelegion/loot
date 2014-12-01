<?php
class CharacterController extends Controller {
	function cadastrar() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./character/cadastrar');
	}
	
	function editar() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./character/editar');
	}
	
	function insert() {
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
				$char = new Character();
				
				$nome = $_POST['txt-nome'];
				$spec = Spec::getById($_POST['txt-spec']);
				$race = Race::getById($_POST['txt-race']);
				$user = Usuario::getById($_POST['txt-user']);
				$raid = Raid::getById('0');
				
				$char->setRaid($raid);
				$char->setUser($user);
				$char->setNome($nome);
				$char->setRace($race);
				$char->setSpec($spec);
				
				echo $char->insert();
			}
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
				
				$nome = $_POST['txt-nome'];
				$spec = Spec::getById($_POST['txt-spec']);
				$race = Race::getById($_POST['txt-race']);
				
				$char = Character::getById($_POST['txt-id']);
				$char->setNome($nome);
				$char->setRace($race);
				$char->setSpec($spec);
				$char->setAtivo(($_POST['txt-ativo'] == 1 ? 1 : 0));
	
				echo $char->update();
			}
		}
	}
	
	function deleteFromRaid() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$id = $_POST['id'];
			
			$char = Character::getById($id);
			$raid = Raid::getById(0);
			$char->setRaid($raid);

			echo $char->update();
		}
	}
	
	function insertOnRaid() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$id = $_POST['id'];
				
			$char = Character::getById($id);
			$raid = Raid::getById(1);
			$char->setRaid($raid);
	
			echo $char->update();
		}
	}
	
	function delete() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$id = $_POST['id'];
				
			$char = Character::getById($id);
				
			$char->delete();
		}
	}
	
	function getById() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
	
		$id = $_POST['id'];
			
		$personagem = Character::getById($id);
	
		$char['id'] = $personagem->getId();
		$char['nome'] = $personagem->getNome();
		
		$char['usuario'] = $personagem->getUser()->getNome();
		
		$char['classe'] = $personagem->getSpec()->getClass()->getNome();
		$char['idClasse'] = $personagem->getSpec()->getClass()->getId();
		
		$char['spec'] = $personagem->getSpec()->getNome();
		$char['idSpec'] = $personagem->getSpec()->getId();
		
		$char['race'] = $personagem->getRace()->getNome();
		$char['idRace'] = $personagem->getRace()->getId();
		
		$char['ativo'] = $personagem->getAtivo();

		echo json_encode($char);
	}
	
	function getByRaid() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			
		$usuarios = Character::getByRaid();
			
		echo json_encode($usuarios);
	}
	
	function getFreeChars() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
				
			$usuarios = Character::getFreeChars();
			
		echo json_encode($usuarios);
	}
	
	function getAll() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			
		$usuarios = Character::getAll();
			
		echo json_encode($usuarios);
	}
}
