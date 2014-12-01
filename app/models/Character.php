<?php
require_once 'app/models/DAO/CharacterDAO.php';
/**
 * Character
 * 
 * @Entity
 * @Table(name="personagem")
 */
class Character {
	
	function __construct() {
		$this->ativo = true;
		$this->loots = 0;
		$this->participacoes = 0;
	}
	
    /**
     * @Id
     * @Column(type="integer", name="id_character")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Column(type="string", name="nome")
     */
    private $nome;
    
    /**
     * @ManyToOne(targetEntity="Race", cascade={"persist"})
     * @JoinColumn(name="race_id_race", referencedColumnName="id_race")
     */
    private $race;
    
    /**
     * @ManyToOne(targetEntity="Spec", cascade={"persist"})
     * @JoinColumn(name="spec_id_spec", referencedColumnName="id_spec")
     */
    private $spec;
    
    /**
     * @Column(type="boolean", name="ativo")
     */
    private $ativo;
    
    /**
     * @ManyToOne(targetEntity="Usuario", cascade={"persist"})
     * @JoinColumn(name="user_id_user", referencedColumnName="id_user")
     */
    private $user;
    
    /**
     * @ManyToOne(targetEntity="Raid", cascade={"persist"}, inversedBy="members")
     * @JoinColumn(name="raid_id_raid", referencedColumnName="id_raid")
     */
    private $raid;

    /**
    * @Column(type="integer", name="participacoes")
    */
    private $participacoes;
    
    /**
    * @Column(type="integer", name="loots")
    */
    private $loots;
	
	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getRace() {
		return $this->race;
	}

	public function getSpec() {
		return $this->spec;
	}

	public function getAtivo() {
		return $this->ativo;
	}

	public function getUser() {
		return $this->user;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setRace($race) {
		$this->race = $race;
	}

	public function setSpec($spec) {
		$this->spec = $spec;
	}

	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	public function setUser($user) {
		$this->user = $user;
	}
	
	public function getRaid() {
		return $this->raid;
	}

	public function setRaid($raid) {
		$this->raid = $raid;
	}
	
	public function getParticipacoes() {
		return $this->participacoes;
	}

	public function getLoots() {
		return $this->loots;
	}

	public function setParticipacoes($participacoes) {
		$this->participacoes = $participacoes;
	}

	public function setLoots($loots) {
		$this->loots = $loots;
	}
	
	function insert() {
		$dao = new CharacterDAO();
	
		return $dao->insert($this);
	}
	
	function update() {
		$dao = new CharacterDAO();
	
		return $dao->update($this);
	}
	
	function delete() {
		$dao = new CharacterDAO();
	
		return $dao->delete($this);
	}
	
	static function getById($id) {
		$dao = new CharacterDAO();
	
		return $dao->getById($id);
	}
	
	static function getAll() {
		$dao = new CharacterDAO();
	
		$dados = $dao->getAll();
		$chars = array();
	
		foreach ($dados as $value) {
			$char['id'] = $value->getId();
			$char['nome'] = $value->getNome();
			
			$char['usuario'] = $value->getUser()->getNick();
			
			$char['classe'] = $value->getSpec()->getClass()->getNome();
			
			$char['spec'] = $value->getSpec()->getNome();
			
			$char['race'] = $value->getRace()->getNome();
			
			
			$char['ativo'] = $value->getAtivo();
				
			$chars[] = $char;
		}
	
		return $chars;
	}
	
	static function getByRaid() {
		$dao = new CharacterDAO();
	
		$dados = $dao->getByRaid();
		$chars = array();
	
		foreach ($dados as $value) {
			$char['id'] = $value->getId();
			$char['nome'] = $value->getNome();
				
			$char['usuario'] = $value->getUser()->getNick();
				
			$char['classe'] = $value->getSpec()->getClass()->getNome();
				
			$char['spec'] = $value->getSpec()->getNome();
			$char['role'] = $value->getSpec()->getRole()->getNome();
			$char['race'] = $value->getRace()->getNome();
			
			$char['participacoes'] = $value->getParticipacoes();
			$char['loots'] = $value->getLoots();
			
			$char['ativo'] = $value->getAtivo();
	
			$chars[] = $char;
		}
	
		return $chars;
	}
	
	static function getFreeChars() {
		$dao = new CharacterDAO();
	
		$dados = $dao->getFreeChars();
		$chars = array();
	
		foreach ($dados as $value) {
			$char['id'] = $value->getId();
			$char['nome'] = $value->getNome();
	
			$char['usuario'] = $value->getUser()->getNick();
	
			$char['classe'] = $value->getSpec()->getClass()->getNome();
	
			$char['spec'] = $value->getSpec()->getNome();
	
			$char['race'] = $value->getRace()->getNome();
	
	
			$char['ativo'] = $value->getAtivo();
	
			$chars[] = $char;
		}
	
		return $chars;
	}
}

?>