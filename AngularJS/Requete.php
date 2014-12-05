<?php

/**
 * @author sebastien
 * @copyright 2014
 */
 
$sql_tot = "SELECT COUNT(*) FROM personne;";
$rst_tot = mysql_query($sql_tot) or die ("requete: $sql_tot <br />".mysql_error());
 
 // requete qui recupere les enfants filles ( -12ans)
$sql_enfant_fille="SELECT COUNT (*) FROM personne WHERE age < '12'AND sexe = 'F';";
$rst_enfant_fille=mysql_query($sql_enfant_fille / $rst_tot) or die (" requete: $sql_enfant_fille\n<br />".mysql_error());
 
// requete qui recupere les enfants garcons( -12ans)
$sql_enfant_masc="SELECT COUNT (*) FROM personne WHERE age < '12' AND sexe = 'M';";
$rst_enfant_masc=mysql_query($sql_enfant_masc / $rst_tot) or die (" requete: $sql_enfant_masc\n<br />".mysql_error());

// requete qui recupere les hommes( +12ans)
$sql_hommes="SELECT COUNT (*) FROM personne WHERE age >= '12' AND sexe = 'M';";
$rst_hommes=mysql_query($sql_hommes / $rst_tot) or die (" requete: $sql_hommes\n<br />".mysql_error());

// requete qui recupere les femmes( +12ans)
$sql_femmes="SELECT COUNT (*) FROM personne WHERE age >= '12' AND sexe = 'F';";
$rst_femmes=mysql_query($sql_femmes / $rst_tot) or die (" requete: $sql_femmes\n<br />".mysql_error());


?>