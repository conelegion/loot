<?php
class ClasseController {
	function getAll() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$classes = Classe::getAll();
				
			echo json_encode($classes);
		}
	}	
}