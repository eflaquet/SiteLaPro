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
      $table = $link->query(" SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite");
      
   ?>
   
<div class="container table-responsive">
  <table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Type</th>
      <th scope="col">Cycle</th>
      <th scope="col">Priorite</th>
      <th scope="col">Probleme</th>
      <th scope="col">Commentaire</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = $table->fetch_array(MYSQLI_ASSOC)){
      if(empty($row)){
  
      }else{
    ?>
        
    <tr>
      <th scope="row"><?php echo $row["id_ticket"];?></th>
      <td><?php echo $row["username"];?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["type"];?></td>
      <td><?php echo $row["cycle"];?></td>
      <td><?php echo $row["priorite"];?></td>
      <td><?php echo $row["categorie"];?></td>
      <td><?php echo $row["commentaire"];?></td>
      <td><?php echo $row["date_echeance"];?></td>
    </tr>
 <?php
      }}
      ?>
      <!--  <input type="date" name="anniversaire"> SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite    
      SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite and priorite.id_priorite = 1
      SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite -->
    </tbody>
  </table>
</div>
</body>
</html>