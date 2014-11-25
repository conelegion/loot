<?php
class CharacterController extends Controller {
	function cadastrar() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./character/cadastrar');
	}
}
