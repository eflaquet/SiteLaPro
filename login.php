<?php 
    include "INCLUDE/function.php";
    include "INCLUDE/user.php";
    include "INCLUDE/database.php";
    $login = new user($link);
    session_start();
    if(isset($_SESSION["user"])){
      header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php css(); ?>

</head>

<body>
  <?php menu(); ?>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="post">
        <input type="email" name="emails" placeholder="email" />
        <input type="password" name="pass" placeholder="password" /> 
        
        <button name="login">login</button>
      </form>
     
    </div>
  </div>

  <?php
    if(isset($_POST['login'])){
        //traitement du password login
        if(!empty($_POST['emails'])){
          $login->Connexion($_POST['emails']);
          if(!empty($_POST['pass'])){
            if($login->compare($_POST['emails'],$_POST['pass'])){
                $_SESSION["user"] = true;
                $_SESSION["id_type"] = $login->getIdticket();
                header("location: index.php");
            }
          }
        }
    }
  ?>

</body>

</html>