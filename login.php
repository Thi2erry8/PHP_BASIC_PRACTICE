<?php 
      session_start();

      if(isset($_SESSION['id'])){
        header('Location: dashboard.php');
      }



?>


<form action="authenticate.php" method="POST">

    <input type="text" name="nom" required placeholder="nom">

    <input type="text" name="prenom" required placeholder="prenom">

    <input type="email" name="email" required placeholder="email">

    <input type="password" name="Pass_1" required placeholder="password">

    <input type="password" name="Pass_2" required placeholder="confirm password">

    <button type="submit">Register</button>

</form>

<form action="authenticate.php" method="POST">

    <input type="email" name="email" required placeholder="email">

    <input type="password" name="Pass" required placeholder="password">

    <button type="submit">LOGIN</button>

</form>