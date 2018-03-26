<?php
session_start();
?>
<?php
include 'functions.php';
?>
<?php include("header.html");?>
<body>
    <?php include("navbar.html");?>
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

        echo '<div class="row">';
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

          echo '<div class="col-xs-12 col-sm-4 col-md-3 text-center">';

          $image="movie_images/".$row["movie_id"].".jpg";
          echo "<img src= '$image'/>";
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
                  <ul class="dropdown-menu">
                  <form action="leaveReview.php"  method = "post">
                  <li> <span class="fas fa-book"></span><input type="submit" name="action" value="Leave Review" />
                  </span><input type="hidden" name="action-button" value="'.$row['movie_id'].'" /></li>

                  </form>
                  <form action="deleteReservation.php"  method = "post">
                  <li> <span class="far fa-frown"></span><input type="submit" name="action" value="Refund" />
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
        <?php
        if (isset($_GET['complex_select'])) {
            $complexID = $_GET['complex_select'];
            $complex_Query = "SELECT * FROM Theatre_Complex WHERE complex_id=".$complexID;
            $complexResult = mysqli_query($connection, $complex_Query);
            $row = mysqli_fetch_row($complexResult);
            echo
            '
              <div class="row" style="background-color:#ffd7b0">
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h2>'.$row[1].'</h2>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>Street: '.$row[2].'</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>City: '.$row[3].'</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>Postal Code: '.$row[4].'</h4>
                </div>
              </div>
            ';
        }
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
