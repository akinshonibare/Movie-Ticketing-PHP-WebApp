<?php
include "database.php";
function isLoggenIn(){
  if(!isset($_SESSION["loggedIn"])){
    header('location: login.php');
  }
}
?>
