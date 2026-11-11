<?php 
  
  session_start();

  require 'database.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

     $email = trim($_POST['email']);

     $pass = $_POST['Pass'];

     if($email === ''){
        $errors[] = 'email is required';
     }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'email invalid';
     }

     if($pass === ''){
         $errors[] = 'password is Required';
     }
     
     if(empty($errors)){
       $stmt= $pdo->prepare("SELECT id , nom ,email ,PASSKEY FROM users 
       WHERE email = ? LIMIT 1");
       $stmt->execute([$email]);
       $user = $stmt->fetch();

       if(!$user || !password_verify($pass,$user['PASSKEY'])){
           $errors[] = "email or password invalid";
       }
     }

     if (!empty($errors)) {
       foreach($errors as $error){
        echo $error . '<br>';
       }
       exit;
     }

     session_regenerate_id(true) ;

     $_SESSION['id'] = $user['id'];
     $_SESSION['nom'] = $user['nom'];
     $_SESSION['email'] = $user['email'];

     header('location: dashboard.php');
     exit;
     
  }





    /* if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $errors = [];

        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = trim($_POST['email']);
        $Pass_1 = $_POST['Pass_1'];
        $Pass_2 = $_POST['Pass_2'];

        if(mb_strlen($nom) < 8 ){
            $errors[] = "Firstname must be minimum 8 character";
        }elseif(mb_strlen($prenom) < 8){
            $errors[] = "lastname must be minimum 8 character";
        }

        if ($email === '') {
        $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)){
             $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
             $stmt->execute([$email]);

             if ($stmt->fetch()){
                $errors[] = "This email is already registered";
             }
        };
        
 
        if($Pass_1 !== $Pass_2){
            $errors[] = "Password is not matching";
        }elseif(mb_strlen($Pass_1) < 8){
          $errors[] = "Password most be minimum 8 character";   
        }

        

        if(!empty($errors)){
          foreach($errors as $error){
               echo htmlspecialchars($error) . "<br>";
          }

          exit;
        }
        

        $hashpass = password_hash( $Pass_1 , PASSWORD_DEFAULT);

        try{
             $stmt = $pdo->prepare("INSERT INTO users(nom,Prenom,email,PASSKEY) VALUES(?,?,?,?)");
             $stmt ->execute([$nom,$prenom,$email,$hashpass]);

             echo "Welcome" . htmlspecialchars($nom) . " ";
        }catch(PDOException $e){
             echo "something wong happened";
        }
   

    } */