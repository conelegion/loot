<?php
class SpecController {
	function getAll() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$specs = Spec::getAll();
				
			echo json_encode($specs);
		}
	}	
	
	function getByClasse() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$classe = $_POST['txt_classe'];
			
			$specs = Spec::getByClasse($classe);
	
			echo json_encode($specs);
		}
	}
}