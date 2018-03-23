<?php
  include 'functions.php';
  session_start();
  isLoggedIn();
?>
<?php include("header.html");?>
  <body>
    <h1>Home</h1>
    <?php
      include "checkLogin.php";
      echo "First Name: " . $_SESSION["first name"]. "<br>";
      echo "Last Name: " . $_SESSION["last name"] . "<br>";
     ?>
  </body>
</html>
