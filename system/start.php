<?php
require_once(dirname(__FILE__).'/../Doctrine.php');
require_once(dirname(__FILE__).'/define.php');
require_once(dirname(__FILE__).'/controller.php');
require_once(dirname(__FILE__).'/route.php');
require_once(dirname(__FILE__).'/system.php');
new Doctrine();
$start = new System();

return $start;