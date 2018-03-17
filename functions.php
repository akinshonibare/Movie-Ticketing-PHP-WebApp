<?php
include "database.php";
function isLoggedIn(){
  if(!isset($_SESSION["loggedIn"])){
    header('location: login.php');
  }
}
?>
