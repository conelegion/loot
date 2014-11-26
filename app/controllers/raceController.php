<?php
class RaceController {
	function getAll() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else {
			$races = Race::getAll();
				
			echo json_encode($races);
		}
	}	
}