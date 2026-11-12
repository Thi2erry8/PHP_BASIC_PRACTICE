<?php
session_start();

     if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit;
     }else{

        var_dump($_SESSION);
        echo 'Bienvenue';
     }

     ?>

<a href="logout.php">Se déconnecter</a>

<a href="users.php">Utilisateur</a>