<?php
class Controller {
	protected function View($layout = '', $dados = null) {
		
		if(empty($layout))	{
			echo 'erro';
		} else {
			if(file_exists(VIEWS.$layout.'View.php')) {
				require_once(VIEWS.$layout.'View.php');
			} else
				require_once(PUBLIC_HTML.'404.html');
		}
	}
}