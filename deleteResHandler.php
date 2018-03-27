<?php session_start();
include "database.php";
include "header.html";
include "navbar.html";
//include "edituser.php";
global $connection;
$val = $_POST['action-button'];

$query = "DELETE FROM reservations WHERE reservation_number ='$val'";
$result = mysqli_query($connection, $query);

echo '<div class="showings-jumbo jumbotron">
        <h1 class="display-4">Refund Issued Successfully...</h1>
        <h1 class="display-4">Redirecting in 3 seconds...</h1>
      </div>
';
header('refresh:3; reservations.php');
?>
