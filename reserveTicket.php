<?php
  session_start();
  include 'functions.php';
  include("header.html");
  global $connection;
?>
<body>
  <?php
  if(isset($_POST['submit'])) {
    $account_number = $_POST['account_number'];
    $showing_id = $_POST['showing_id'];
    $movie_id = $_POST['movie_id'];
    $complex_id = $_POST['complex_id'];
    $theatre_num = $_POST['theatre_num'];
    $num_tickets_reserved = $_POST['num_seats'];

    //Post new reservation to database
    
  }
?>

</body>
