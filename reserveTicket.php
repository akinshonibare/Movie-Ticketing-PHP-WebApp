<?php
  session_start();
  include 'functions.php';
  include("header.html");
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
    $reservationQuery = "INSERT INTO Reservations (num_tickets_reserved,account_number,showing_id,movie_id,complex_id,theatre_num) ";
    $reservationQuery .= "VALUES('$num_tickets_reserved','$account_number','$showing_id','$movie_id','$complex_id','$theatre_num')";
    $result = mysqli_query($connection, $reservationQuery);
    if(!$result){
        die('Query Failed' . mysqli_error());
    }else{
        echo "Seats Reserved";
        header( "refresh:3;url=profile.php" );
    }

  }
?>

</body>
