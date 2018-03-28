<?php
session_start();
?>
<?php
include 'functions.php';
?>
<?php include("header.html");?>
<body>
  <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
      <div class="container-fluid"><a class="navbar-brand" href="index.php">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse"
              id="navcol-1">
              <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Showings</a></li>
                  <?php
                  if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
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
                <h1 class="display-4">Reservation History</h1>
              </div>
        ';
        //remove WHERE from this query to get all showings and their relevant info
        $query = "SELECT * FROM reservations WHERE account_number=".$_SESSION['account number'];
        $result = mysqli_query($connection, $query);

        echo '<div class="row" style="margin-bottom:30px;">';
        if(isset($result)){
          $count = 0;
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //get movie name
          $movie_query = "SELECT title FROM movie WHERE movie_id =".$row['movie_id'];
          $movie_title = mysqli_query($connection, $movie_query);
          $movie_row = mysqli_fetch_row($movie_title);

          //get showings by id for date
          $sid = $row['showing_id'];
          $showing_query = "SELECT showing_date, complex_id, start_time, theatre_num FROM showing WHERE showing_id ='$sid'";
          $showing_result= mysqli_query($connection, $showing_query);
          $showing_row = mysqli_fetch_row($showing_result);

          //get complex name
          $cid = $showing_row[1];
          $complex_query = "SELECT name FROM theatre_complex WHERE complex_id ='$cid'";
          $complex_result= mysqli_query($connection, $complex_query);
          $complex_row = mysqli_fetch_row($complex_result);

          echo '<div class="col-xs-12 col-sm-6 col-md-4 text-center">';

          $image="movie_images/".$row["movie_id"].".jpg";
          echo "<img class='movie_image' src= '$image'/>";
          echo "<br>";
          echo "Movie Title: ".$movie_row[0]."<br>";
          echo "Date: ".$showing_row[0]."<br>";
          echo "Start Time: ".$showing_row[2]."<br>";
          echo "Theatre #: ".$showing_row[3]."<br>";
          echo "Tickets: ".$row["num_tickets_reserved"]."<br>";

          echo '<div class="span2">
              <div class="btn-group">
                  <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                      Action
                      <span class="icon-cog icon-white"></span><span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu text-center">
                  <form action="leaveReview.php"  method = "post">
                  <li style="margin-bottom:10px;"> <i class="edit-icon fas fa-book"></i><input style="width:124px;" class="btn btn-primary" type="submit" name="action" value="Leave Review" />
                  </span><input type="hidden" name="action-button" value="'.$row['movie_id'].'" /></li>

                  </form>
                  <form action="deleteReservation.php"  method = "post">
                  <li> <i class="edit-icon far fa-frown"></i><input style="width:124px;" class="btn btn-danger" type="submit" name="action" value="Refund" />
                  </span><input type="hidden" name="action-button" value="'.$sid.'" /></li>

                  </form>

                  </ul>
              </div>
          </div>';
          //<li><a href="reservations.php"><span class="fas fa-book"></span> Leave Review</a></li>
          //<li><a href="edituser.php"><span class="far fa-frown"></span> Refund Tickets</a></li>
          echo '</div>';
          $count = $count+1;
        }
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
