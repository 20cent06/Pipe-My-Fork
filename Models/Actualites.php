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
		$actualite = $pdo->getGroupe($unIdGroupe); 

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

	

	public function getGroupeTableau($dossier){


		$tableau ="";
		setlocale(LC_TIME, 'french');
		/* if (($this->idGroupe == 5) || ($this->idGroupe == 7) || ($this->nbFichiers >= 1)){ */

		$tableau = $tableau . "<table class='table'>
		                <thead>
		                    <tr>
		                    	<th><p class='tableau-titre'></p></th>
		                        <th><p class='tableau-titre'>Nom du fichier</p></th>
		                        <th class='hidden-xs'><p class='tableau-titre'>Téléchargement</p></th>
		                        <th><p class='tableau-titre'>Dernière modification</p></th>
		                    </tr>
		                </thead>
		                <tbody>";

		foreach ($this->fichiers as $ligneFichier){
			$filename = cheminFichier($this->utilisateur['NOMCOMPLET'], $dossier, $this->chemin, $ligneFichier['CHEMINFICHIER']);
			if (file_exists("gestion/" . $filename ) ){
				$tableau = $tableau . "<tr><td style='width:10%;'>
											<a href='index.php?uc=Visualisation&action=" . $filename . "' target='_blank'>
												<button type='button' class='btn btn-pcoste btn-lg'>
													<span class='glyphicon glyphicon-search'></span>
												</button>
											</a>
										</td>
										<td style='width:40%;'>  
											<p class='tableau-contenu margin-tableau'>" . $ligneFichier['NOMFICHIER'] . "</p>														
										</td>";
				$tableau = $tableau . "<td style='width:27%;' class='hidden-xs'> <a href='index.php?uc=Telechargement&action=" . $filename . "' target='_blank'><button type='button' class='btn btn-pcoste btn-lg'><span class='glyphicon glyphicon-cloud-download'></span> </button></a> <p class='margin-tableau'>  " . $ligneFichier['CHEMINFICHIER'] . "</p> 	</td>";
				$tableau = $tableau . "<td style='width:23%;'>" . str_replace("-", "<br>", strftime('%A %d %B %Y - %Hh%M ' ,filemtime('gestion/' . $filename)))  . "</td>";
				$tableau = $tableau . "</tr>";
			}

			else{
				$tableau = $tableau . "<tr><td style='width:10%;'>&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-exclamation-sign'></span></td>";
				$tableau = $tableau . "<td style='width:40%;'>";
				$tableau = $tableau . "<b>" . $ligneFichier['NOMFICHIER'] . " </b> : Fichier indisponible";
				$tableau = $tableau . "</td><td style='width:27%' class='hidden-xs'></td><td width='23%'></td></tr>";
			}

		}

		$tableau = $tableau . "</tbody> </table>";

	/* }

	else if($this->nbFichiers == 1){

		foreach ($this->fichiers as $ligneFichier) {
			$filename = cheminFichier($this->utilisateur['NOMCOMPLET'], $dossier, $this->chemin, $ligneFichier['CHEMINFICHIER']);
			if (file_exists("gestion/" . $filename ) ){
				$tableau = $tableau . "<iframe class='iframe-auto' src='index.php?uc=Visualisation&action=" . $filename . "'></iframe>";
			}

			else{
				$tableau = $tableau . "	<table class='table'>
		                					<thead>
							                    <tr>
							                        <th><p class='tableau-titre'>Nom du fichier</p></th>
							                        <th class='hidden-xs'><p class='tableau-titre'>Téléchargement</p></th>
							                        <th><p class='tableau-titre'>Dernière modification</p></th>
							                    </tr>
							                </thead>
							                <tbody>";
				$tableau = $tableau . "<tr><td width='50%'>";
				$tableau = $tableau . $ligneFichier['NOMFICHIER'];
				$tableau = $tableau . "</td><td width='30%' class='hidden-xs'></td><td>Non disponible</td></tr>";
				$tableau = $tableau . "</tbody> </table>";
			}
		}	
			
	}
	*/
	

	return $tableau;
	}

	public static function getIconesGroupes($idUtilisateur){

	$icones ="<div id='Icones'> <!-- Icones -->
		<div class='box pull-left'> 
	      <a id='img1' class='content' href='#RealisationTTC" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img2' class='content' href='#AnalyseCA" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img3' class='content' href='#QualiteDesSalons" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img4' class='content' href='#AnalyseClientele" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img5' class='content' href='#FichesIndividuelles" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img6' class='content' href='#EtatDeCaisse" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>

	    <div class='box pull-left'> 
	      <a id='img7' class='content' href='#ReunionAnimateurs" . $idUtilisateur . "' data-toggle='tab'></a> 
	    </div>
  	</div> <!-- / Icones -->";
  	return $icones;
	}

}
?>
