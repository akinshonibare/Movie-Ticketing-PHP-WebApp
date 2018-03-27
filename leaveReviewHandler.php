<?php
session_start();
include "database.php";
include "header.html";
include "navbar.html";

global $connection;
$body = $_POST['body'];
$rating = $_POST['rating'];
$movie_id = $_POST['movie_id']; ?>
<br>
<br>
<br>
<br>
<br>
<?php
date_default_timezone_set('UTC');

$curdate = date('y-m-d');

$acno = $_SESSION['account number'];
// echo $acno;
// echo '<br>';
//
// echo $rating;
// echo '<br>';
// echo $body;
// echo '<br>';
// echo $movie_id;
// echo '<br>';
// echo $curdate;

$query = "INSERT INTO movie_reviews (movie_id,account_number,review_date,rating,body) ";
$query .= "VALUES('$movie_id','$acno','$curdate','$rating','$body')";

$result = mysqli_query($connection, $query);

if(!$result){
    //die('Query Failed' . mysqli_error());
    echo '<div class="showings-jumbo jumbotron">
            <h1 class="display-4">Post Failed: You have already reviewed this film </h1>
            <h1 class="display-4">Redirecting in 3 seconds...</h1>
          </div>
    ';
    header('refresh:3; index.php');
}else{
  echo '<div class="showings-jumbo jumbotron">
          <h1 class="display-4">Review Posted Successfully</h1>
          <h1 class="display-4">Redirecting in 3 seconds...</h1>
        </div>
  ';
  header('refresh:3; index.php');
}

?>
