<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Raid
 * 
 * @Entity
 * @Table(name="raid")
 */
class Raid {	
	public function __construct() {
		$this->horarios = new ArrayCollection();
		$this->members = new ArrayCollection();
	}
	
    /**
     * @Id
     * @Column(type="integer", name="id_raid")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", name="nome")
     */
    private $nome;
    
    /**
     * @Column(type="string", name="observacao")
     */
    private $observacao;  

    /**
     * @Column(type="boolean", name="ativo")
     */
    private $ativo;
    
    /**
     * @OneToOne(targetEntity="User", cascade={"persist"})
     * @JoinColumn(name="user_id_user", referencedColumnName="id_user")
     */
    private $lider;
     
    /**
     * @OneToMany(targetEntity="Horario", mappedBy="raid")
     **/
    public $horarios;
    
    /**
     * @OneToMany(targetEntity="Character", mappedBy="raid")
     **/
    public $members;
   
  
	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getObservacao() {
		return $this->observacao;
	}

	public function getAtivo() {
		return $this->ativo;
	}

	public function getLider() {
		return $this->lider;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}

	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	public function setLider($lider) {
		$this->lider = $lider;
	}
	
	public function getHorarios() {
		return $this->horarios;
	}

	public function setHorarios($horarios) {
		$this->horarios = $horarios;
	}
	
	public function getMembers() {
		return $this->members;
	}

	public function setMembers($members) {
		$this->members = $members;
	}
}
?>