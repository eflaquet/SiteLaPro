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
     $tablemaintance = $link->query("SELECT maintenance.id_maintenance, user.username, user.name, type.type, cycle.cycle, priorite.priorite, categorie.categorie,commentaire, date_echeance FROM maintenance ,type, cycle, categorie, user, priorite WHERE maintenance.id_user = user.id_user and maintenance.id_type = type.id_type and maintenance.id_cycle = cycle.id_cycle and maintenance.id_categorie = categorie.id_categorie and maintenance.id_priorite = priorite.id_priorite ORDER BY maintenance.id_maintenance ASC");
     if(isset($_POST['ticket']))
     header("location: ticket_look.php");

     if($_SESSION["id_type"] == 1){
   ?>
   <div class="page">
   <div class="form">
      <form method="post">
        <button name="ticket">Voir Ticket</button>
      </form>
    </div>
   </div>
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
      <th scope="row"><?php echo $row["id_maintenance"];?></th>
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
   <?php }else header("location: index.php");
   ?>
</body>
</html>
<?php
mysqli_close($link);
  ?>