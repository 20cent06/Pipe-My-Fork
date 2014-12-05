<?php

class Personnes{
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
		$personne = $pdo->getGroupe($idPersonne); 

		$this->utilisateur = $pdo->getUtilisateur($unIdUtil);

		$this->idGroupe = $unGroupe['IDGROUPE'];
		$this->nomGroupe = $unGroupe['NOMGROUPE'];
		$this->chemin = $unGroupe['CHEMINGROUPE'];
		$this->nbFichiers = $pdo->getNbFichiersGroupe($unIdGroupe);
			
		$lesFichiers = $pdo -> getFichiersGroupe($unIdGroupe);
		if ($this->idGroupe == 5){

			$salons = salon::getSalons($this->utilisateur['ID']);
			foreach ($salons as $unSalon) {		
				$leFichier = new fichier(6, $this->utilisateur['ID']);
				$nomFichier = $leFichier->getNomFichier() . " - " . $unSalon['NOMSALON'];
				$cheminFichier = $leFichier->getChemin() . $unSalon['CODESALON'] . ".PDF";
				array_push($this->fichiers, array("IDFICHIER"=>6, "NOMFICHIER"=>$nomFichier, "CHEMINFICHIER"=>$cheminFichier ));
			}

		}

		else{
			foreach ($lesFichiers as $ligneFichier){
				$leFichier = new fichier($ligneFichier['IDFICHIER'], $this->utilisateur['ID']);
				array_push($this->fichiers, array("IDFICHIER"=>$leFichier->getId(), "NOMFICHIER"=>$leFichier->getNomFichier(), "CHEMINFICHIER"=>$leFichier->getChemin() ));
			}			
		}

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
