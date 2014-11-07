<?php
/**
 * Character
 * 
 * @Entity
 * @Table(name="personagem")
 */
class Character {
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
     * @ManyToOne(targetEntity="User", cascade={"persist"})
     * @JoinColumn(name="user_id_user", referencedColumnName="id_user")
     */
    private $user;
    
    /**
     * @ManyToOne(targetEntity="Raid", cascade={"persist"})
     * @JoinColumn(name="raid_id_raid", referencedColumnName="id_raid")
     */
    private $raid;
	
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
}

?>