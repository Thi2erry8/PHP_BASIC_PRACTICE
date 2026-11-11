<?php
 
  require('database.php');

    $stmt = $pdo->prepare('SELECT id , nom , prenom , email FROM users');
    $stmt->execute();

    $users = $stmt->fetchAll();

    foreach($users as $user){
        echo $user['id'] . '<br>' 
        . $user['nom'] . '<br>'  
        . $user['prenom'] . '<br>' 
        . $user['email'];
    };