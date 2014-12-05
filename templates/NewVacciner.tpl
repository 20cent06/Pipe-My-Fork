<div class="vacciner-container">
    <h1 style="text-align: center; color: red">Ajouter Une Personne Vacciner</h1>
    
<form method="post" class="form-horizontal" role="form">
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
            <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
</form>
    <?php
        if(isset($_POST['valider'])){
            if (isset ($_POST['nom'])){
                Personnes::addPersonne($_POST['nom'], $_POST['prenom'], $_POST['age'],$_POST['sexe']);
            }
        }
    ?>
</div>