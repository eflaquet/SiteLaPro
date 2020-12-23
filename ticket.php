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
      $tableticket = $link->query("SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite ORDER BY `ticket`.`id_ticket` ASC ");
      $tableticketges = $link->query("SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite ORDER BY `ticket`.`id_ticket` ASC ");
      $tableticketpro = $link->query("SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite,maintenance WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite and ticket.id_ticket = maintenance.id_ticket ORDER BY `ticket`.`id_ticket` ASC");
      $tablemaintance = $link->query("SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite,maintenance WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite and ticket.id_ticket = maintenance.id_ticket ORDER BY `ticket`.`id_ticket` ASC");
      if($_SESSION["id_type"] == 1){
   ?>
   <div class="page">
   <div class="form">
      <form method="post">
        <button name="ticket">Voir Ticket</button>
        <button name="newmaintenace">ajouter une maintenance</button>
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
   
   if(isset($_POST['ticket'])){
   
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
    while($row = $tableticket->fetch_array(MYSQLI_ASSOC)){
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
  
  </table>
</div>
<?php

    }
    if(isset($_POST['maintance'])){?>
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
    while($row = $tablemaintance->fetch_array(MYSQLI_ASSOC)){
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
  
  </table>
</div>
      <?php 
      } 
      if(isset($_POST['newmaintenace'])){
        
      }
      ?>
      <!--  <input type="date" name="anniversaire"> SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite    
      SELECT user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite and priorite.id_priorite = 1
      SELECT ticket.id_ticket, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM `ticket` ,type, cycle, categorie, user, priorite WHERE ticket.id_user = user.id_user and ticket.id_type = type.id_type and ticket.id_cycle = cycle.id_cycle and ticket.id_categorie = categorie.id_categorie and ticket.id_priorite = priorite.id_priorite -->
  
</body>
</html>