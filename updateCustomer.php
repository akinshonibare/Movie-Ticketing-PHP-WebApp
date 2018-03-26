<?php
//function updateCust(){
session_start();
include "database.php";
//include "edituser.php";
global $connection;

    if(isset($_POST['submit'])) {
      $cityName = $_POST['city'];
      $acc_no = $_SESSION["account number"];
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


      mysqli_query($connection, "UPDATE customer SET password = '$pw', street = '$street_name', city = '$cityName', pc = '$postalcode'  WHERE account_number = '$acc_no'");
      //$result = mysqli_query($connection, $query);
      header('location: editUser.php');



      // $account_number = $_POST['username'];
      // $password = $_POST['password'];
      //
      // $query = "SELECT first_name, last_name, account_number, phone_number, street, city, pc FROM Customer WHERE account_number = '$account_number' AND password = '$password'";
      // $result = mysqli_query($connection, $query);
      //
      // if($result->num_rows == 0){
      //   die(header("location:login.php?loginFailed=true"));
      // }else{
      //   session_start();
      //   $row = mysqli_fetch_row($result);
      //   //header('location: home.php?first_name='.$row[0].'&last_name='.$row[1]);
      //   $_SESSION["first name"] = $row[0];
      //   $_SESSION["last name"] = $row[1];
      //   $_SESSION["account number"]= $row[2];
      //   $_SESSION["loggedIn"] = 'True';
      //   header('location: home.php');
        // echo "First Name: " . $row[0] . "<br>";
        // echo "Last Name: " . $row[1] . "<br>";
      }

  ?>
