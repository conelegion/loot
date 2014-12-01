<?php
class RaidController extends Controller {
	function montar() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./raid/montar');
	}
}