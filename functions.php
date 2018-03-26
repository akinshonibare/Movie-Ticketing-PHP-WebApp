<?php
include "database.php";
function isLoggedIn(){
  if(!isset($_SESSION["loggedIn"])){
    header('location: login.php');
  }
}

function isAdmin(){
  if($_SESSION["isAdmin"] == 0){
    header('location: index.php');
  }
}

function showMovies(){
  global $connection;

  echo '<div class="showings-jumbo jumbotron">
          <h1 class="display-4">Showings</h1>
        </div>
  ';
  $complexQuery = "SELECT * FROM Theatre_Complex";
  $complexResult = mysqli_query($connection, $complexQuery);
  // Complex Selector

  echo '
    <div class="container-fluid">
      <div class="row">
          <div class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
            <form action="index.php" id="movie_complex">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-success" type="button submit">Select Complex</button>
                </div>
                  <select class="custom-select" id="complex_select" name="complex_select">
                    <option selected>Choose...</option>';
                    while ($row = mysqli_fetch_array($complexResult, MYSQLI_ASSOC)) {
                      echo '<option value="'.$row["complex_id"].'">'.$row["name"].'</option>';
                    }
                      echo '
                  </select>
              </div>
            </form>
          </div>
        </div>
      <div class="row">
            ';
  $query = "SELECT * FROM Movie";
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '<div class="col-xs-12 col-sm-4 col-md-3 text-center">';
    $image="movie_images/".$row["movie_id"].".jpg";
    echo "<img src= '$image'/>";
    echo "<br>";
    echo "Movie Title: ".$row["title"]."<br>";
    echo "Running Time: ".$row["running_time"]."<br>";
    echo "Rating: ".$row["rating"]."<br>";
    echo "ID: ".$row["movie_id"]."<br>";
    echo "</div>";
  }
  echo '</div';
  echo '</div>';
  echo '</div>';

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
            $query .= "VALUES('$accountNumber','$password','$firstName','$lastName','$street','$city','$pc','$phoneNumber','$creditCardNumber','$creditCardExpiry','$creditCardCVC', '0')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Query Failed' . mysqli_error());
            }else{
                header('location: login.php');
            }
        }
}
?>
