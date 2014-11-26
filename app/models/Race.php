<?php
require_once 'app/models/DAO/RaceDAO.php';
/**
 *
 * @Entity
 * @Table(name="race")
 */
class Race {	
	/**
	 * @Id
	 * @Column(type="integer", name="id_race")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @Column(type="string", name="nome")
	 */
	private $nome;
	
	
	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	static public function getAll() {
		$dados = RaceDAO::getAll();
		$races = array();
	
		foreach ($dados as $value) {
			$race['id'] = $value->getId();
			$race['nome'] = $value->getNome();
	
			$races[] = $race;
		}
	
		return $races;
	}
	
	static function getById($id) {
		$dao = new RaceDAO();
	
		return $dao->getById($id);
	}
}
?>