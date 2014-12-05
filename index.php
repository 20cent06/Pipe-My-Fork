<!DOCTYPE html>
<!--
    Created on : 4 déc. 2014, 20:33:36
    Author     : Pipe My Fork - Nuit de l'info 2014
-->

<?php
    $page = (isset($_GET['page'])) ? htmlentities($_GET['page']) : NULL;
    include 'config/config.php';
?>

<html>
    <head>
        <title>Humanitaire 2.0</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Humanitaire 2.0">
        <meta name="author" content="Equipe Pipe My Fork - Nuit de l'info 2014">
        <!-- TODO   =>  Choisir un favicon et le placer dans le dossier img/
        <link rel="shortcut icon" href="images/favicon.ico"/>
        -->

        <!-- Local Bootstrap core CSS -->
        <link href="bootstrap-3.3.1/css/bootstrap.css" rel="stylesheet">
        
        <!-- CDM Bootstrap core CSS
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        -->
        
        <!-- Custom styles for this template -->
        <link href="css/global.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="header-background"></div>
            <ul class="nav nav-justified nav-pills">
                <li><a href="index.php?page=PreventionEtInformation_Actualite.tpl"><img src="img/prevention.jpg" class="img-circle img-responsive"></a>Prévention & Information</li>
                <li><a href="index.php?page=CampagneVaccination.tpl"><img src="img/vaccination.jpg" class="img-circle img-responsive"></a>Campagne de vaccination</li>
                <li><a href="#"><img src="img/deplacement_population.png" class="img-circle img-responsive"></a>Déplacement de population</li>
            </ul>
        </header>
        <div class="container">
            <!-- Contenu importé depuis les differentes pages : "nom_page".tpl -->
            <?php
                if ( $page ) {
                    include('templates/' . $page);
                }
                else {
                    include('templates/PreventionEtInformation_Actualite.tpl');
                }
            ?>
        </div>
        <footer>
            
        </footer>
    </body>
    
    <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        
        <!-- Local Bootstrap core JavaScript -->
        <script src="bootstrap-3.3.1/js/bootstrap.min.js"></script>
        
        <!-- CDN Bootstrap core JavaScript :
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
        -->
        
        <!-- JavaScript du projet -->
        <script src="js/global.js"></script>
</html>
