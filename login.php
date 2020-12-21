<?php 
    include "INCLUDE/function.php";
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
        <input type="text" placeholder="username" />
        <input type="password" placeholder="password" />
        <button>login</button>
      </form>
    </div>
  </div>

</body>

</html>