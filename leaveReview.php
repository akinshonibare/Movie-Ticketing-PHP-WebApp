<?php
//function updateCust(){
session_start();
include 'functions.php';
include "header.html";
isLoggedIn();
//include "edituser.php";
global $connection;
$val = $_POST['action-button'];
echo $val;
?>
<body>
<nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
    <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav ml-auto">

                <?php
                if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                  echo '<li class="nav-item" role="presentation"><a class="nav-link" href="showing.php">Showings</a></li>';
                  echo '<li class="nav-item" role="presentation"><a class="nav-link" href="profile.php">Profile</a></li>';
                  echo '<li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {
                  echo '<li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Login</a></li>';
                }
                ?>
                <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){
                  echo '<li class="nav-item" role="presentation"><a class="nav-link" href="admin.php">Admin</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
  <section id="cover">
      <?php
      global $connection;

      echo '<div class="showings-jumbo jumbotron">
              <h1 class="display-4">Post your review</h1>
            </div>
      ';
      //remove WHERE from this query to get all showings and their relevant info
      //$query = "SELECT * FROM showing WHERE showing_id ='$val'";
      //$result = mysqli_query($connection, $query);

      echo '<div class="row" style="text-align: center; margin:0 auto; margin-bottom:30px;">';
      //if(isset($result)){
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$mid = $row["movie_id"];


        //get movie name
        $movie_query = "SELECT * FROM movie WHERE movie_id ='$val'";
        $movie_title = mysqli_query($connection, $movie_query);
        if(isset($movie_title)){
        $movie_row = mysqli_fetch_row($movie_title);

        /*
        //get reservation id
        $res_query = "SELECT * FROM reservations WHERE showing_id ='".$val."' AND account_number ='".$_SESSION['account number']."'";
        $res_title = mysqli_query($connection, $res_query);
        $res_row = mysqli_fetch_row($res_title);

        //get showings by id for date
        //$sid = $row['showing_id'];
        $showing_query = "SELECT showing_date, complex_id, start_time, theatre_num FROM showing WHERE showing_id ='$val'";
        $showing_result= mysqli_query($connection, $showing_query);
        $showing_row = mysqli_fetch_row($showing_result);

        //get complex name
        $cid = $showing_row[1];
        $complex_query = "SELECT name FROM theatre_complex WHERE complex_id ='$cid'";
        $complex_result= mysqli_query($connection, $complex_query);
        $complex_row = mysqli_fetch_row($complex_result);
        */
        echo '<div style=" margin: 0 auto;">';

        $image="movie_images/".$val.".jpg";
        echo "<img src= '$image'/>";
        echo "<br>";
        echo "<b>Movie Title:</b> ".$movie_row[1]."<br>";
        $reviewID =1;

        ////<input type="hidden" name="action-button" value="'.$reviewID.'" />
        echo '<div class="span2">
            <div class="btn-group">

                <form action="leaveReviewHandler.php"  method = "post">
                <b>Rating (out of 10):</b>
                <select name="rating">
                    <option hidden="0">Select a rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select> <br><br>
                <b>Enter Review:</b> <br><textarea class="form-control" style="text-align:left; maxlength="139" rows="3" cols="60" name="body"/>
                </textarea>
                <br>
                <input type="hidden" name="movie_id" value="'.$movie_row[0].'" />
                <input style = "float:right;" class="btn btn-success" type="submit" name="action" value="Post" />
                </span>


                </form>


            </div>
        </div>';
        //<li><a href="reservations.php"><span class="fas fa-book"></span> Leave Review</a></li>
        //<li><a href="edituser.php"><span class="far fa-frown"></span> Refund Tickets</a></li>
        echo '</div>';

      echo '</div';
      echo '</div';
      //echo '</div';
    }
      ?>

  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
