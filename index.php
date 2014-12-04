<!DOCTYPE html>
<!--
    Created on : 4 déc. 2014, 20:33:36
    Author     : Vincent
-->

<?php
    $page = (isset($_GET['page'])) ? htmlentities($_GET['page']) : NULL;
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
</html>
