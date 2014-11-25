<?php
require_once 'bootstrap.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class Doctrine {
    /**
     * @var EntityManager Doctrine Entity Manager
     */
    private static $entityManager = NULL;
    public function __construct() {

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
        self::$entityManager = EntityManager::create($dbParams, $config);
    }

    /**
     * @return EntityManager Doctrine Entity Manager
     */
    public static function getEntityManager() {
        return self::$entityManager;
    }
}