<?php
session_start();
    if(!$_SESSION["user"]){
        header("location: index.php");
      }else{
          session_destroy();
          header("location: index.php");
      }
?>