<?php 
     
     require_once __DIR__ . "/vendor/autoload.php";

     use App\Models\User;


     $user = new User();

     echo $user->getName();