<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="class")
 */
class Classe {	
	
	public function __construct() {
		$this->specs = new ArrayCollection();
	}
	
	/**
	 * @Id
	 * @Column(type="integer", name="id_class")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @Column(type="string", name="nome")
	 */
	private $nome;
	
	/**
	 * @OneToMany(targetEntity="Spec", mappedBy="class")
	 **/
	private $specs;		
	
	public function getSpecs() {
		return $this->specs;
	}

	public function setSpecs($specs) {
		$this->specs = $specs;
	}

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