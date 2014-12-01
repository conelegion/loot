<?php
class LootController extends Controller {
	function index_action() {
		if(empty($_SESSION['usuario']))
			header("Location: /loot");
		else
			$this->View('./loot/gerenciar');
	}
}