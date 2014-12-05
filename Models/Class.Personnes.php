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
		return $this->idGroupe;
	}

	public function getNomGroupe(){
		return $this->nomGroupe;
	}

	public function getChemin(){
		return $this->chemin;
	}

	public function getFichiers(){
		return $this->fichiers;  
	}

	public function getNbFichiers(){
		return $this->nbFichiers;
	}

	public static function getGroupes(){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$groupes = $pdo->getGroupes();
		return $groupes;
	}
}
