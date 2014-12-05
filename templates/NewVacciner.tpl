<div class="container">
    <h1 style="text-align: center; color: red">Ajouter Une Personne Vacciner</h1>
    
<form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nom : </label>
          <div class="col-sm-10">
            <input name="nom" type="text" class="form-control" placeholder="Nom">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Prénom : </label>
          <div class="col-sm-10">
            <input name="prenom" type="text" class="form-control" placeholder="Prenom">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Age : </label>
          <div class="col-sm-10">
            <input name="age" type="text" class="form-control" placeholder="Age">
          </div>
        </div>
    <div class="form-group">
          <label class="col-sm-2 control-label">Sexe : </label>
          <div class="col-sm-10">
            <input name="sexe" type="text" class="form-control" placeholder="Sexe">
          </div>
        </div>
    <div class="form-group">
          <label class="col-sm-2 control-label">Nom du Vaccin utiliser : </label>
          <div class="col-sm-10">
            <input name="vaccin" type="text" class="form-control" placeholder="Vaccin">
          </div>
        </div>
    <div class="form-group">
          <label class="col-sm-2 control-label">Version du Vaccin : </label>
          <div class="col-sm-10">
            <input name="version" type="text" class="form-control" placeholder="Version">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button name="valider" type="button" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
</form>
    <?php
        //si l'utilisateur valide
        if (isset ($_POST['valider'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];
            $vaccin = $_POST['vaccin'];
            $version = $_POST['version'];
            
            $insert = "INSERT INTO personne(nom, prenom, age, sexe) VALUES ('$nom','$prenom','$age','$sexe');";
            $recupId = "SELECT id FROM personne WHERE nom = '$nom' AND prenom = '$prenom';";
            $insert = "";
            
            if (empty ($nom)||($prenom)||($age)||($sexe)||($vaccin)||($version)){
                echo "Veuillez renseigner toutes les informations du formulaires !";
            }
            else {
                
            }
        }
    ?>
</div>