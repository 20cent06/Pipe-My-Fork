<?php

class Personnes{
	private $id;   		
  	private $nom;
  	private $prenom;    		
	private $age;
	private $sexe;
/**
 * Constructeur privé, crée l'instance de l'utilisateur
 * pour toutes les méthodes de la classe
 */				
	public function __construct($id){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$personne = $pdo->getPersonne($id); 

		$this->id = $personne['ID'];
		$this->nom = $personne['NOM'];
		$this->prenom = $personne['PRENOM'];
		$this->age = $personne['AGE'];
		$this->sexe = $personne['SEXE'];
			

	} // public function __construct(...)


	public function getId(){
		return $this->id;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function getAge(){
		return $this->age;  
	}

	public function getSexe(){
		return $this->sexe;
	}

	public static function addPersonne($nom, $prenom, $age, $sexe){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$pdo->addPersonne($nom, $prenom, $age, $sexe);
	}
}
