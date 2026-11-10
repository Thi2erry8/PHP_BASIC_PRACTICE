<?php
session_start();

     if (!$_SESSION['id']) {
        header('login.php');
     }else{

        var_dump($_SESSION);
        echo 'Bienvenue';
     }

     ?>

<a href="logout.php">Se déconnecter</a>