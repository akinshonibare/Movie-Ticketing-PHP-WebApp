<?php
include "database.php";
function isLoggedIn(){
  if(!isset($_SESSION["loggedIn"])){
    header('location: login.php');
  }
}

function showMovies(){
  global $connection;

  $query = "SELECT * FROM Movie";
  $result = mysqli_query($connection, $query);
  echo '<div class="container-fluid">';
  echo '<div class="row">';
  // $i = -1;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    // $i++;
    // $movie[$i]['movie_id'] = $row["movie_id"];
    // $movie[$i]['title'] = $row["title"];
    // $movie[$i]['running_time'] = $row["running_time"];
    // $movie[$i]['rating'] = $row["rating"];
    
    echo '<div class="col-xs-12 col-sm-4 col-md-3">';
    $image="movie_images/".$row["movie_id"].".jpg";
    echo "<img src= '$image'/>";
    echo "<br>";
    echo "Movie Title: ".$row["title"]."<br>";
    echo "Running Time: ".$row["running_time"]."<br>";
    echo "Rating: ".$row["rating"]."<br>";
    echo "</div>";
  }
  echo '</div';
  echo '</div';
}

function addInfo(){
        global $connection;
        if(isset($_POST['submit'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $pc = $_POST['pc'];
            $phoneNumber = $_POST['phoneNumber'];
            $creditCardNumber = $_POST['creditCardNumber'];
            $creditCardExpiry = $_POST['creditCardExpiry'];
            $creditCardCVC = $_POST['creditCardCVC'];
            $accountNumber = $_POST['accountNumber'];
            $password = $_POST['password'];


            //used to check input to not mess up database and allow " ' " in names
            $firstName = mysqli_real_escape_string($connection, $firstName);
            $lastName = mysqli_real_escape_string($connection, $lastName);
            $street = mysqli_real_escape_string($connection, $street);
            $city = mysqli_real_escape_string($connection, $city);
            $pc = mysqli_real_escape_string($connection, $pc);
            $phoneNumber = mysqli_real_escape_string($connection, $phoneNumber);
            $creditCardNumber = mysqli_real_escape_string($connection, $creditCardNumber);
            $creditCardExpiry = mysqli_real_escape_string($connection, $creditCardExpiry);
            $creditCardCVC = mysqli_real_escape_string($connection, $creditCardCVC);
            $accountNumber = mysqli_real_escape_string($connection, $accountNumber);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "INSERT INTO Customer(account_number, password, first_name, last_name, street, city, pc, phone_number, credit_card_number, credit_card_expiry, credit_card_cvc) ";
            $query .= "VALUES('$accountNumber','$password','$firstName','$lastName','$street','$city','$pc','$phoneNumber','$creditCardNumber','$creditCardExpiry','$creditCardCVC')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Query Failed' . mysqli_error());
            }else{
                header('location: login.php');
            }
        }
}
?>
