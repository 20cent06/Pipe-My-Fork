<?php

class ListActualites{		
  	private $listActualite;
  	private $lieu;
  	private $lieux;  		
/**
 * Constructeur privé, crée l'instance de l'utilisateur
 * pour toutes les méthodes de la classe
 */				
	public function __construct($lieux){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$this->listActualite = $pdo->getActualites($lieux);
		$this->lieu = $lieux;
		$this->lieux = $pdo->getLieux();
	} // public function __construct(...)


	public function getActualites(){
		return $this->listActualite;
	}

	public function getLieu(){
		return $this->lieu;
	}

	public function getLieux(){
		return $this->lieux;
	}

}
?>
