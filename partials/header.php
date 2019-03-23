<?php
    
    // Inclusion du fichier global
    require_once (__DIR__ . '/../functions/global.php');
    
    // Inclusion du fichier database
    require_once (__DIR__. '/../config/database.php');

    // Inclusion du function
    require_once (__DIR__ . '/../functions/getAnnonces.php');
    require_once (__DIR__ . '/../functions/addAnnonce.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Immobilier</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" href="index.php">Immobilier</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="annonces.php">Les annonces</a>
                    <a class="nav-item nav-link" href="index.php">Créer une annonce</a>
                </div>
            </div>
        </div><!-- container -->
    </nav><!-- nav -->
    