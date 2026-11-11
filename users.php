<?php

 session_start();
 
  require('database.php');

  if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit;
  }

    $stmt = $pdo->prepare('SELECT id , nom , prenom , email FROM users');
    $stmt->execute();

    $users = $stmt->fetchAll();

    foreach($users as $user){
        echo htmlspecialchars((string)$user['id']) . '<br>' 
        . htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8')  . '<br>'  
        . htmlspecialchars($user['prenom'], ENT_QUOTES, 'UTF-8')  . '<br>' 
        . htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ;
    };