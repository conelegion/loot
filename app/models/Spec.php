<?php
require_once 'app/models/DAO/SpecDAO.php';

/**
 * Spec
 * 
 * @Entity
 * @Table(name="spec")
 */
class Spec {
	
    /**
     * @Id
     * @Column(type="integer", name="id_spec")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Column(type="string", name="nome")
     */
    private $nome;
    
    /**
     * @ManyToOne(targetEntity="Classe", cascade={"persist"}, inversedBy="specs")
     * @JoinColumn(name="class_id_class", referencedColumnName="id_class")
     */
    private $class;
    
    /**
     * @ManyToOne(targetEntity="Atributo", cascade={"persist"})
     * @JoinColumn(name="atributo_id_atributo", referencedColumnName="id_atributo")
     */
    private $atributo;
    
    /**
     * @ManyToOne(targetEntity="Role", cascade={"persist"})
     * @JoinColumn(name="role_id_role", referencedColumnName="id_role")
     */
    private $role;
	
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
	
	public function getClass() {
		return $this->class;
	}

	public function setClass($class) {
		$this->class = $class;
	}
	
	public function getAtributo() {
		return $this->atributo;
	}

	public function getRole() {
		return $this->role;
	}

	public function setAtributo($atributo) {
		$this->atributo = $atributo;
	}

	public function setRole($role) {
		$this->role = $role;
	}
	
	static public function getAll() {

		$dados = SpecDAO::getAll();
		$specs = array();
		
		foreach ($dados as $value) {
			$spec['id'] = $value->getId();
			$spec['nome'] = $value->getNome();
			$spec['class'] = $value->getClass()->getNome();
			$spec['atributo'] = $value->getAtributo()->getNome();
			$spec['role'] = $value->getRole()->getNome();
				
			$specs[] = $spec;
		}
		
		return $specs;
	}
	
	static public function getByClasse($classe) {
	
		$dados = SpecDAO::getByClasse($classe);
		$specs = array();
	
		foreach ($dados as $value) {
			$spec['id'] = $value->getId();
			$spec['nome'] = $value->getNome();
	
			$specs[] = $spec;
		}
		return $specs;
	}
	
	static function getById($id) {
		$dao = new SpecDAO();
	
		return $dao->getById($id);
	}
}