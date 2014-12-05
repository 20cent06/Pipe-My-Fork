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

    public function addPersonne($nom, $prenom, $age, $sexe){
		$req = "INSERT INTO PERSONNE(NOM, PRENOM, AGE, SEXE)
		 VALUES ('".$nom."','".$prenom."',".$age.",'".$sexe."')";
		$rs = PdoTpPhp::$monPdo->query($req);
	}

	public function getPersonne($id){
		$req = "SELECT ID, NOM, PRENOM, AGE, SEXE FROM PERSONNE
		WHERE id=".$id;
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}


}

/*

	public function getInfosAnimateur($login, $mdp){
		$req = "SELECT ID, LOGIN, PRIVILEGE, NOMCOMPLET FROM UTILISATEUR 
		where LOGIN='$login' and PASSWORD='$mdp'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function setPasswordUtilisateur($id,$nouveauMotDePasse){

		$req = "UPDATE UTILISATEUR SET PASSWORD ='".$nouveauMotDePasse."' WHERE id=".$id;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function getAnimateurs(){
		$req = "SELECT ID, PRIVILEGE, NOMCOMPLET FROM UTILISATEUR WHERE PRIVILEGE =1 AND ID !=".$_SESSION['ID']." ORDER BY NOMCOMPLET";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getUtilisateurs(){
		$req = "SELECT ID, PRIVILEGE, NOMCOMPLET FROM UTILISATEUR WHERE PRIVILEGE =2 ORDER BY NOMCOMPLET" ;
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getAdministrateurs(){
		$req = "SELECT ID, PRIVILEGE, NOMCOMPLET FROM UTILISATEUR WHERE PRIVILEGE =3 AND ID !=".$_SESSION['ID']." ORDER BY NOMCOMPLET";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getUtilisateur($idUtilisateur){
		$req = "SELECT ID, LOGIN, PRIVILEGE, NOMCOMPLET FROM UTILISATEUR WHERE ID = '$idUtilisateur' ";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getFichier($idFichier){
		$req = "SELECT IDFICHIER, NOMFICHIER, CHEMINFICHIER, IDGROUPE FROM FICHIER WHERE IDFICHIER='$idFichier'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getDernFichier(){
		$req = "SELECT COUNT(*) FROM FICHIER";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		$nb = $ligne[0] - 1;
		return $nb;
	}
	public function getFichiersGroupe($idGroupe){
		$req = "SELECT IDFICHIER, NOMFICHIER, CHEMINFICHIER FROM FICHIER WHERE IDGROUPE='$idGroupe'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}
	public function getNbFichiersGroupe($idGroupe){
		$req = "SELECT COUNT(*) FROM FICHIER WHERE IDGROUPE =".$idGroupe;
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		$nb = $ligne[0];
		return $nb;
	}
	public function getGroupe($idGroupe){
		$req = "SELECT IDGROUPE, NOMGROUPE, CHEMINGROUPE FROM GROUPEFICHIER
		WHERE IDGROUPE ='$idGroupe'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getGroupes(){
		$req = "SELECT IDGROUPE, NOMGROUPE, CHEMINGROUPE FROM GROUPEFICHIER";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getSalon($id){ 
		$req = "SELECT IDSALON,CODESALON, NOMSALON, ID FROM SALON WHERE IDSALON='$id'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getSalonsUtilisateur($idUtil){
		$req = "SELECT IDSALON,CODESALON, NOMSALON, ID FROM SALON WHERE ID='$idUtil'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getToutSalons(){
		$req = "SELECT IDSALON,CODESALON, NOMSALON, ID FROM SALON ORDER BY CODESALON";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getDossier($idDossier){
		$req = "SELECT IDDOSSIER, NOMDOSSIER FROM DOSSIER
		WHERE IDDOSSIER ='$idDossier'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getUnHistorique($type,$action,$tri,$ordre,$debut,$fin){
		$req = "SELECT idEntree, (SELECT COUNT(*) FROM HISTORIQUE WHERE TYPE =  '".$type."' AND ACTION='".$action."') as NBLIGNES, TYPE , ACTION , DETAIL, DATE, UTILISATEUR
		FROM HISTORIQUE WHERE TYPE =  '".$type."' AND ACTION='".$action."' ORDER BY ".$tri." ".$ordre. " LIMIT ". $debut." , ".$fin;
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getDossiers(){
		$req = "SELECT IDDOSSIER, NOMDOSSIER FROM DOSSIER";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function getfichierParChemin($chemingroupe,$cheminFichier){
		$req = "select * from FICHIER f, GROUPEFICHIER g where f.idgroupe=g.idgroupe
			and chemingroupe ='".$chemingroupe."' and cheminFichier='".$cheminFichier."'";
		$rs = PdoTpPhp::$monPdo->query($req);
		$tableau = $rs->fetchAll();
		return $tableau;
	}
	public function supprimerFichier($idFichier){
		$req = 'delete from FICHIER where idfichier='.$idFichier;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function ajouterUtilisateur($login, $password,$privilege,$nomComplet){
		$req = "INSERT INTO UTILISATEUR(login,password,privilege,nomComplet) VALUES ('".$login."','".$password."','".$privilege."','".$nomComplet."')";
		$rs = PdoTpPhp::$monPdo->query($req);
	}
public function creerEntreeHistorique($type, $action,$detail,$nomUtilisateur){
		$req = "INSERT INTO HISTORIQUE(Type, Action, Detail, Date, Utilisateur)
		 VALUES ('".$type."','".$action."','".$detail."',Now(),'".$nomUtilisateur."')";
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function editerUtilisateur($id,$login, $password,$privilege,$nomComplet){
		if ($password != '') {
			$password=",password='".$password."'";
		}
		$req = "UPDATE UTILISATEUR SET login='".$login."'".$password.",privilege='".$privilege."',nomComplet='".$nomComplet."' WHERE ID=".$id;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function supprimerUtilisateur($id){
		$req = 'delete from UTILISATEUR where id='.$id;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function ajouterSalon($codeSalon,$nomSalon,$idUtilisateur)
	{
		$req = "INSERT INTO SALON(CODESALON,NOMSALON,ID) VALUES ('".$codeSalon."','".$nomSalon."','".$idUtilisateur."')";
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function editerSalon($idSalon,$codeSalon,$nomSalon,$idUtilisateur){
		$req = "UPDATE SALON SET CODESALON='".$codeSalon."', nomSalon='".$nomSalon."',id=".$idUtilisateur." WHERE IDSALON=".$idSalon;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function supprimerSalon($idSalon){
		$req = 'delete from SALON where idSalon='.$idSalon;
		$rs = PdoTpPhp::$monPdo->query($req);
	}
	public function setNomFichier($idFichier, $nouveauNom){
		$req = "UPDATE FICHIER SET nomFichier = '".$nouveauNom."' WHERE idFichier = ".$idFichier;
		$rs = PdoTpPhp::$monPdo->query($req);
		}
	public function newFichier($nomFichier, $cheminFichier, $idGroupe){
		$req = "INSERT INTO FICHIER (nomFichier, cheminFichier, idGroupe) VALUES ('" . $nomFichier . "', '" . $cheminFichier . "', " . $idGroupe . ");";
		$rs = PdoTpPhp::$monPdo->prepare($req);
		$rs->execute(); 
		$idFic=PdoTpPhp::$monPdo->lastInsertId(); 
		return $idFic;
		}
	}ob_end_clean();

	*/