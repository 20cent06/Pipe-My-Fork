<div class="find-container">
    <h1 style="text-align: center; color: red">Chercher quelqu'un</h1>
    <form method='post'>
      <div class="form-group">
          <label class="col-sm-2 control-label">Nom de la personne à rechercher : </label>
          <div class="col-sm-10">
            <input name="find" type="text" class="form-control" placeholder="Nom">
          </div>
        </div>
 <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button name="valider" type="submit" class="btn btn-primary">Rechercher</button>
          </div>
        </div>
    </form>
    <?php
        if (isset($_POST['valider'])){
            if (isset($_POST['find'])){
            
                echo Personnes::getIdPersonne($_POST['find'])->getNom();
                echo Personnes::getIdPersonne($_POST['find'])->getPrenom();
                echo Personnes::getIdPersonne($_POST['find'])->getAge();
                echo Personnes::getIdPersonne($_POST['find'])->getSexe();
            }
        }
    ?>
</div>