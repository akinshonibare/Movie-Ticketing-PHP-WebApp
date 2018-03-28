<?php
session_start();
include 'functions.php';
include("header.html");

?>
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
    <div class="showings-jumbo jumbotron">
      <h1 class="display-4">Movie</h1>
    </div>
    <div class="container-fluid">
      <?php
      global $connection;
      //Query for movie info if showing tagged in URL
      if (isset($_GET['movieID'])){
          $movie_id = $_GET['movieID'];
          $showingQuery = "SELECT * FROM Movie WHERE movie_id = '$movie_id'";
          $showingResult = mysqli_query($connection, $showingQuery);

          if($showingResult->num_rows == 0){
            echo '<div><h3> No Results </h3></div>';
          } else{
          $row = mysqli_fetch_row($showingResult);
          $reviewQuery = "SELECT * FROM Movie_Reviews WHERE movie_id ='$movie_id'";
          $reviewResult = mysqli_query($connection, $reviewQuery);
          $image="movie_images/".$row[0].".jpg";
          echo '<div class="row movie-showing-main">';
          echo '<div class="col-sm-12 col-md-4 text-center" style="margin-bottom:20px;">';
          echo '<h2 style="visibility:hidden">XYZ</h2>';
          echo "<img class='movie_image' src= '$image'/>";
          echo "</div>";
          echo '<div class="col-sm-12 col-md-4" style="margin-bottom:20px;">';
          echo '
          <h2> Movie Info </h2>
          <ul class="list-group" style="width:100%;">
            <li class="list-group-item"><b>Title:</b>  '.$row[1].'</li>
            <li class="list-group-item"><b>Start Date:</b>  '.$row[8].'</li>
            <li class="list-group-item"><b>End Date:</b>'.$row[9].'</li>
            <li class="list-group-item"><b>Running Time:</b>  '.$row[2].'</li>
            <li class="list-group-item"><b>Rating:</b>  '.$row[3].'</li>
            <li class="list-group-item"><b>Director:</b>  '.$row[5].'</li>
            <li class="list-group-item"><b>Description:</b>  '.$row[4].'</li>
          </ul>
          ';
          echo "</div>";
          //Review Column
          echo '<div class="col-sm-12 col-md-4" style="margin-bottom:20px;">';
          echo '<h2> Reviews </h2>';
          if($reviewResult->num_rows == 0){
            echo '<div><h4> No Reviews Found </h4></div>';
          } else{
            echo' <ul class="list-group" style="width:100%;">';
            while($reviewRow = mysqli_fetch_array($reviewResult, MYSQLI_ASSOC)) {
              echo '<li class="list-group-item"><b>Score ('.$reviewRow["rating"].'/10): </b>'.$reviewRow["body"].'</li>';
            }
            echo'</ul>';
          }

          echo '</div>';

          echo "</div>";
          echo '</div>';
        }
      } else{
        header('Location: index.php');
      }
      ?>
    </div>
  </body>
