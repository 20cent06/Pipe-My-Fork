<?php
/*
 * Classe d'accès aux utilisateurs
*/
class Actualites{
	private $id;   		
  	private $titre;
  	private $info;    		
	private $date; /* contient tout les fichiers dans les différents groupes */
	private $image;
/**
 * Constructeur privé, crée l'instance de l'utilisateur
 * pour toutes les méthodes de la classe
 */				
	public function __construct($id){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$actualite = $pdo->getActualite($id); 

		$this->id = $actualite['ID'];
		$this->titre = $actualite['TITRE'];
		$this->info = $actualite['CHEMINGROUPE'];
		$this->date = $actualite['DATE'];
		$this->info = $actualite['IMAGE'];
	} // public function __construct(...)


	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->nomGroupe;
	}

	public function getInfo(){
		return $this->chemin;
	}

	public function getDate(){
		return $this->fichiers;  
	}

	public function getImage(){
		return $this->nbFichiers;
	}

}
?>
