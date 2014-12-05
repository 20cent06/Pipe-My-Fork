<?php
$page = (isset($_GET['page'])) ? htmlentities($_GET['page']) : NULL;
    include 'config/config.php';
?>
<div class="container">
    <h1 style="text-align: center; color: red">Gestion des Stocks de Vaccin</h1>
    Rechercher un Vaccin : <select class="form-control">
        <?php 
        $query ="SELECT RefVaccin FROM stock;";
        if (! $query) { echo "Erreur requete"; } 
        while ($ligne=mysql_fetch_array($query))
        {
        ?>
<option><?php echo ''.$ligne['RefVaccin'].'';?> </option>
<?php
}
?>
    </select>
    
    Rechercher un Foyer : <select class="form-control">
        <?php 
        $query ="SELECT idFoyer FROM stock;";
        if (! $query) { echo "Erreur requete"; } 
        while ($ligne=mysql_fetch_array($query))
        {
        ?>
<option><?php echo ''.$ligne['idFoyer'].'';?> </option>
<?php
}
?>
    </select>
    
    <table class="table table-condensed">
        
</table>
</div>