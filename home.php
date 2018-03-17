<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <h1>Home</h1>
    <?php
      include "checkLogin.php";
      echo "First Name: " . $_SESSION["first name"]. "<br>";
      echo "Last Name: " . $_SESSION["last name"] . "<br>";
     ?>
  </body>
</html>
