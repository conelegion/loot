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
}