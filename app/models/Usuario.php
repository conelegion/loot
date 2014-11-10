<?php
require 'bootstrap.php';
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 * 
 * @Entity
 * @Table(name="user")
 */
class Usuario {
	
	public function __construct() {
		$this->chars = new ArrayCollection();
	}
	
	 /**
     * @Id
     * @Column(type="integer", name="id_user")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Column(type="string", name="nome")
     */
    private $nome;
    
    /**
     * @Column(type="string", name="mail")
     */
    private $mail;
    
    /**
     * @Column(type="string", name="senha")
     */
    private $senha;
    
    /**
     * @Column(type="string", name="nick")
     */
    private $nick;
    
    /**
     * @Column(type="boolean", name="ativo")
     */
    private $ativo;
    
    /**
     * @OneToMany(targetEntity="Character", mappedBy="user")
     **/
    private $chars;
    
	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getMail() {
		return $this->mail;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function getNick() {
		return $this->nick;
	}

	public function getAtivo() {
		return $this->ativo;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setMail($mail) {
		$this->mail = $mail;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function setNick($nick) {
		$this->nick = $nick;
	}

	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	
	public function getChars() {
		return $this->chars;
	}
	
	public function setChars($chars) {
		$this->chars = $chars;
	}
	
	public function logar($usuario, $senha) {
		require_once 'app/models/DAO/UserDAO.php';
		
		$dao = new UserDAO();
		$user = $dao->logar($usuario, $senha);
		
		if($user) {
			$_SESSION['usuario'] = $user;
			
			echo "sucesso";
		} else {
			echo "falha";
		}
	}
	
	function deslogar() {
		session_regenerate_id(true);
		session_unset();
		session_destroy();
	}
	
}
?>