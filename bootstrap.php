<?php
// bootstrap.php
//vamos configurar a chamada ao Entity Manager, o mais importante do Doctrine

// o Autoload é responsável por carregar as classes sem necessidade de incluí-las previamente
require_once "system/autoload.php";
require_once "app/models/Race.php";
require_once "app/models/Classe.php";
require_once "app/models/Spec.php";
require_once "app/models/Role.php";
require_once "app/models/Atributo.php";
require_once "app/models/User.php";
require_once "app/models/Raid.php";
require_once "app/models/Horario.php";
require_once "app/models/Character.php";

require_once "app/models/teste.php";

// o Doctrine utiliza namespaces em sua estrutura, por isto estes uses 
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//onde irão ficar as entidades do projeto? Defina o caminho aqui
$entidades = array("app/models/");
$isDevMode = true;

// configurações de conexão. Coloque aqui os seus dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
	//'host'     => 'localhost:3307',
    'password' => '',
    'dbname'   => 'loot',
);

//setando as configurações definidas anteriormente
$config = Setup::createAnnotationMetadataConfiguration($entidades, $isDevMode);

//criando o Entity Manager com base nas configurações de dev e banco de dados
$entityManager = EntityManager::create($dbParams, $config);
