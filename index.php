<?php
session_start();
?>
<?php
include 'functions.php';
?>
<?php include("header.html");?>
<body>
  <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
      <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse"
              id="navcol-1">
              <ul class="nav navbar-nav ml-auto">

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
                <h1 class="display-4">All Showings</h1>
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
                          <option selected value="-1">Choose...</option>';
                          while ($row = mysqli_fetch_array($complexResult, MYSQLI_ASSOC)) {
                            echo '<option value="'.$row["complex_id"].'">'.$row["name"].'</option>';
                          }
                            echo '
                        </select>
                    </div>
                  </form>
                </div>
              </div>';
            //Complex Information
            if (isset($_GET['complex_select']) && $_GET['complex_select'] != -1) {
                $complexID = $_GET['complex_select'];
                $complex_Query = "SELECT * FROM Theatre_Complex WHERE complex_id=".$complexID;
                $complexResult = mysqli_query($connection, $complex_Query);
                $row = mysqli_fetch_row($complexResult);
                echo
                '
                  <div class="row complex-header">
                    <div class="col-sm-12">
                      <h2>'.$row[1].'</h2>
                    </div>
                  </div>
                  <div class="row">
                ';
                $showingQuery = "SELECT * FROM Movie INNER JOIN Showing ON Showing.movie_id = Movie.movie_id WHERE complex_id=".$complexID."";
                $showingResult = mysqli_query($connection, $showingQuery);
                $rowCheck = mysqli_query($connection, $showingQuery);
                if($rowCheck->num_rows === 0){
                  echo '<div class="col-sm-12 text-center"> <h5>No Showing Results :(</h5></div>';
                  echo "</div>";
                } else {
                while ($row = mysqli_fetch_array($showingResult, MYSQLI_ASSOC)) {
                  echo "<div class=\"col-xs-12 col-sm-4 col-md-3 text-center showing-banner\" id=\"".$row["showing_id"]."\">";
                  $image="movie_images/".$row["movie_id"].".jpg";
                  echo "<img class='movie_image' src= '$image'/>";
                  echo "<br>";
                  echo "Movie Title: ".$row["title"]."<br>";
                  echo "Theatre: ".$row["theatre_num"].", Seats Available: ".$row["seats_available"]." <br>";
                  echo "Running Time: ".$row["running_time"]."<br>";
                  echo "Start Date: ".$row["start_date"]."<br>";
                  echo "End Date: ".$row["end_date"]."<br>";
                  echo "Rating: ".$row["rating"]."<br>";
                  echo "<div class=\"showing-banner-id\" style = \"visibility: hidden\">".$row["showing_id"]."</div>";
                  echo "</div>";
                }
                echo "</div>";
              }
            } else {
              echo
              '
                <div class="row complex-header">
                  <div class="col-sm-12">
                    <h2>Select a complex to browse movie showings!</h2>
                  </div>
                </div>
              ';
            }
            echo '<div class="row" style = "background-color:#808080; color:white; padding-top:40px; padding-bottom:40px;">
                  <div class="col-sm-12 text-center">
                  <h2>Movies Out Now</h2>
                  </div>

                  ';
              $query = "SELECT * FROM Movie";
              $result = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<div class="col-xs-12 col-sm-4 col-md-3 text-center">';
                $image="movie_images/".$row["movie_id"].".jpg";
                echo "<img class='movie_image' src= '$image'/>";
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
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

    var showingIDS = document.getElementsByClassName('showing-banner');
    if(showingIDS){
      console.log("showing IDS", showingIDS);
      for(var i = 0; i < showingIDS.length; i++){
        showingIDS[i].addEventListener("click", function(){
          console.log(this.id + " clicked");
          handleShowingClick(this.id);
        });
      }
    }

    function handleShowingClick(showingID){
      if (showingID) {
        window.location = 'showing.php?showingID='+showingID;
      }
    }
    </script>
</body>
</html>
