<?php
/**
  * Horario
  *
  * @Entity
  * @Table(name="horario_raid")
  */
class Horario {
	/**
	 * @Id
	 * @Column(type="integer", name="id_horario_raid")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @Column(type="string", name="dia")
	 */
	private $dia;
	
	/**
	 * @Column(type="string", name="duracao")
	 */
	private $duracao;
	
	/**
	 * @Column(type="string", name="inicio")
	 */
	private $inicio;
	
	/**
	 * @ManyToOne(targetEntity="Raid", cascade={"persist"},
	 * inversedBy="horarios")
	 * @JoinColumn(name="raid_id_raid", referencedColumnName="id_raid")
	 */
	private $raid;
	public function getId() {
		return $this->id;
	}
	public function getData() {
		return $this->dia;
	}
	public function getDuracao() {
		return $this->duracao;
	}
	public function getInicio() {
		return $this->inicio;
	}
	public function getRaid() {
		return $this->raid;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setData($dia) {
		$this->dia = $dia;
	}
	public function setDuracao($duracao) {
		$this->duracao = $duracao;
	}
	public function setInicio($inicio) {
		$this->inicio = $inicio;
	}
	public function setRaid($raid) {
		$this->raid = $raid;
	}
}