<?php
/*
 * Classe d'accès aux utilisateurs
*/
class Actualites{
	private $id;   		
  	private $titre;
  	private $info;    		
	private $dates; /* contient tout les fichiers dans les différents groupes */
	private $image;
/**
 * Constructeur privé, crée l'instance de l'utilisateur
 * pour toutes les méthodes de la classe
 */				
	public function __construct($id){
		$pdo = PdoTpPhp::getPdoTpPhp();
		$actualite = $pdo->getActualite($id); 

		$this->id = $actualite['id'];
		$this->titre = $actualite['titre'];
		$this->info = $actualite['info'];
		$this->dates = $actualite['dates'];
		$this->info = $actualite['image'];
	} // public function __construct(...)


	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function getInfo(){
		return $this->info;
	}

	public function getDate(){
		return $this->dates;  
	}

	public function getImage(){
		return $this->image;
	}

}
?>
