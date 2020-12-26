<?php 
    include "INCLUDE/function.php";
    include "INCLUDE/database.php";
    session_start();
    if(!$_SESSION["user"]){
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
    
    <?php
     if($_SESSION["id_type"] == 1){
   ?>
   <div class="page">
   <div class="form">
      <form method="post">
        <button name="ticket">Voir Ticket</button>
        <button name="maintance">Voir Maintenace</button>
      </form>
    </div>
   </div>
   <?php }else{?>
    <div class="page">
   <div class="form">
      <form method="post">
        <!-- NON ADMIN-->
      </form>
     
    </div>
   </div>
   <?php } 
   
   if(isset($_POST['ticket']))
    header("location: ticket_look.php");
 
    
    if(isset($_POST['maintance']))
      header("location: ticket_maintenace.php");
       

      ?>
      <!--  <input type="date" name="anniversaire"> SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite    
      SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite and priorite.id_priorite = 1
      SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite -->

</body>
</html>
<?php
mysqli_close($link);
  ?>