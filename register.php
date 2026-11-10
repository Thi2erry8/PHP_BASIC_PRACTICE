<?php 
  require 'database.php';


    if($_SERVER['REQUEST_METHOD'] === 'POST'){

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
   

    }