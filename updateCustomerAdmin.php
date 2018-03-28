<?php
//function updateCust(){
session_start();
include "database.php";
//include "edituser.php";
global $connection;

    if(isset($_POST['submit'])) {
      $first_name= $_POST['first_name'];
      $last_name= $_POST['last_name'];
      $cityName = $_POST['city'];
      $acc_no = $_POST['account_num'];
      $street_name = $_POST['street'];
      $current_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      $postalcode = $_POST['postal_code'];

      $query = "SELECT password FROM Customer WHERE account_number = '$acc_no'";
      $pwq = mysqli_query($connection, $query);
      $row = mysqli_fetch_row($pwq);
      $pw = $row[0];
      if( $current_password == $pw){
        if($new_password == $confirm_password){
          $pw = $new_password;
        }
      }


      mysqli_query($connection, "UPDATE customer SET first_name = '$first_name', last_name = '$last_name', password = '$pw', street = '$street_name', city = '$cityName', pc = '$postalcode'  WHERE account_number = '$acc_no'");
      $result = mysqli_query($connection, $query);
      header('location: admin.php');


      }

  ?>
