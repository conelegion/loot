<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php
// adicionaCategoria.php

/*
 * Fazendo o require do arquivo Bootstrap.php, podemos utilizar tudo que lá foi definido.
 * Estou falando principalmente do EntityManager, criado sobre a variável $entityManager
 */
require_once 'bootstrap.php';
/**
 * 
 *  instanciando a entidade Categoria
 */
$user = new User;
$char = new Character;
$spec = new Spec;
$race = new Race;
$raid = new Raid;
/**
 * 
 * utilizando a função setNome 
 * Defino o nome da categoria a ser criada no banco de dados
 */

$classes = $entityManager->getRepository('Classe')->findAll();
echo "<h1>Classes  e Specs</h1>";
foreach ($classes as $classe) {
	echo "<h3 style='margin-bottom: 0px;'>".$classe->getNome()."</h3>";
	foreach ($classe->getSpecs() as $spec) {
		echo "&nbsp;&nbsp;►&nbsp;".$spec->getNome()." (".$spec->getRole()->getNome()." - ".$spec->getAtributo()->getNome().")<br />";
	}
}




//$user = $entityManager->getRepository('User')->findOneBy(array('nome' => 'Guilherme'));
//$spec = $entityManager->getRepository('Spec')->findOneBy(array('nome' => 'Survival'));
//$race = $entityManager->getRepository('Race')->findOneBy(array('nome' => 'Troll'));
//$raid = $entityManager->getRepository('Raid')->findOneBy(array('nome' => 'teste'));
//$char->setNome("Bostildo");

//$char->setSpec($spec);
//$char->setRace($race);
//$char->setRaid($raid);
//$char->setAtivo("1");
//$char->setUser($user);

//$entityManager->persist($char);

//$char->setUser($user);
//$char->setNome('Zódd');

//$spec = );
//$char->setSpec($spec);


//$char->setRace($race);
//char->setAtivo('1');

/**
 * 
 * Aqui o EM entra em ação. 
 * A função persist aguarda por um objeto  para colocá-lo na fila
 * de instruções a ser executada sobre o banco de dados
 */

/**
 * 
 * Novamente o EM age e invoca a função flush.
 * Esta é a responsável por pegar todas as intruções previamente preparadas
 * pelo persist e executá-las no banco de dados. 
 * Só a apartir daqui o banco é alterado de alguma forma.
 */
$entityManager->flush();
?>
</body>
</html>