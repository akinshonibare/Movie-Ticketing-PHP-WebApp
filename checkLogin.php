<?php
  include "database.php";
  global $connection;

  if(isset($_POST['submit'])) {
    $account_number = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT first_name, last_name, account_number, phone_number, street, city, pc FROM Customer WHERE account_number = '$account_number' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if($result->num_rows == 0){
      die(header("location:login.php?loginFailed=true"));
    }else{
      session_start();
      $row = mysqli_fetch_row($result);
      //header('location: home.php?first_name='.$row[0].'&last_name='.$row[1]);
      $_SESSION["first name"] = $row[0];
      $_SESSION["last name"] = $row[1];
      $_SESSION["account number"]= $row[2];
      $_SESSION["loggedIn"] = 'True';
      header('location: home.php');
      // echo "First Name: " . $row[0] . "<br>";
      // echo "Last Name: " . $row[1] . "<br>";
    }
}
?>
