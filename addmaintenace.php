<?php
include "INCLUDE/database.php";
include "INCLUDE/ticket.php";
$ticket = new ticket($link);
$id = null; if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } if (null == $id) { header("location: index.php"); }
$ticket->addMaintenance($id);
header("location: ticket_look.php");
