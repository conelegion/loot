<?php
/**
 *
 * @Entity
 * @Table(name="role")
 */
class Role {	
	/**
	 * @Id
	 * @Column(type="integer", name="id_role")
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