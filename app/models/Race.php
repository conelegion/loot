<?php
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
}
?>