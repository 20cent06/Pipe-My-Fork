<?php
ob_start();
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class PdoTpPhp{   		
		private static $serveur='mysql:host=localhost';
		private static $bdd='dbname=pipe-my-fork';   		
		private static $user='user' ;    		
		private static $mdp='user' ;	
		private static $monPdo;
		private static $monPdoTpPhp=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
		PdoTpPhp::$monPdo = new PDO(PdoTpPhp::$serveur.';'.PdoTpPhp::$bdd, PdoTpPhp::$user, PdoTpPhp::$mdp); 
		PdoTpPhp::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoTpPhp::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 * Appel : $instancePdoGsb = PdoTpPhp::getPdoTpPhp();
 * @return l'unique objet de la classe PdoTpPhp
 */
	public static function getPdoTpPhp(){
		if(PdoTpPhp::$monPdoTpPhp==null){
			PdoTpPhp::$monPdoTpPhp= new PdoTpPhp();
		}
		return PdoTpPhp::$monPdoTpPhp;  
	}

	public function getActualite($id){
		$req = "SELECT id, titre, info, image, dates FROM news
		WHERE id=".$id;
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function getActualites($lieux){
		$req = "SELECT ID, TITRE, INFO, IMAGE, DATES, LIEUX FROM NEWS, ACTULIEU
		WHERE ACTULIEU.IDNEW = NEWS.ID AND LIEUX = '".$lieux."' ORDER BY DATE";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
    }

    public function getLieux(){
		$req = "SELECT LIEUX FROM LOCALISATION";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
    }


}

