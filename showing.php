<?php
session_start();
include 'functions.php';
isLoggedIn();
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
      <h1 class="display-4">Movie Showing</h1>
    </div>
    <div class="container-fluid">
      <?php
      global $connection;
      //Query for movie info if showing tagged in URL
      if (isset($_GET['showingID'])){
          $showing_id = $_GET['showingID'];
          $showingQuery = "SELECT * FROM Showing INNER JOIN Movie ON Showing.movie_id = Movie.movie_id WHERE showing_id = '$showing_id'";
          $showingResult = mysqli_query($connection, $showingQuery);

          if($showingResult->num_rows == 0){
            echo '<div><h3> No Results </h3></div>';
          } else{
          $row = mysqli_fetch_row($showingResult);
          $reviewQuery = "SELECT * FROM Movie_Reviews WHERE movie_id ='$row[2]'";
          $reviewResult = mysqli_query($connection, $reviewQuery);
          $image="movie_images/".$row[2].".jpg";
          echo '<div class="row movie-showing-main">';
          echo '<div class="col-sm-12 col-md-4 text-center" style="margin-bottom:20px;">';
          echo '<h2 style="visibility:hidden">XYZ</h2>';
          echo "<img class='movie_image' src= '$image'/>";
          echo "</div>";
          echo '<div class="col-sm-12 col-md-4" style="margin-bottom:20px;">';
          echo '
          <h2> Movie Info </h2>
          <ul class="list-group" style="width:100%;">
            <li class="list-group-item"><b>Title:</b>  '.$row[8].'</li>
            <li class="list-group-item"><b>Date:</b>  '.$row[1].'</li>
            <li class="list-group-item"><b>Start Time:</b>  <span id="showing-start-time">'.$row[4].'</span></li>
            <li class="list-group-item"><b>Theatre:</b>  '.$row[5].'</li>
            <li class="list-group-item"><b>Running Time:</b>  '.$row[9].'</li>
            <li class="list-group-item"><b>Rating:</b>  '.$row[10].'</li>
            <li class="list-group-item"><b>Director:</b>  '.$row[12].'</li>
            <li class="list-group-item"><b>Description:</b>  '.$row[11].'</li>
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
          echo '<div class="row movie-showing-reserve">';
          //Reserve Button
          echo '
          <div class="col-sm-12 text-center" style="margin-bottom:30px;">
            <div class="form-wrapper" style="float:right;">
            <form class="form-inline" action="reserveTicket.php" method="post">
            <div class="form-group">

              <select name="num_seats" class="seats-label form-control text-center" id="seats" style="margin-left:20px;width:150px; margin-right:30px;">
                <option value="1">1 seat</option>
                <option value="2">2 seats</option>
                <option value="3">3 seats</option>
                <option value="4">4 seats</option>
                <option value="5">5 seats</option>
                <option value="6">6 seats</option>
                <option value="7">7 seats</option>
                <option value="8">8 seats</option>
                <option value="9">9 seats</option>
                <option value="10">10 seats</option>
              </select>
            </div>
              <input type="hidden" name="account_number" value='.$_SESSION["account number"].'>
              <input type="hidden" name="showing_id" value='.$showing_id.'>
              <input type="hidden" name="movie_id" value='.$row[2].'>
              <input type="hidden" name="complex_id" value='.$row[3].'>
              <input type="hidden" name="theatre_num" value='.$row[5].'>
              <div class="form-group">
              <button type="submit" value="submit" name="submit" class="btn btn-success btn-lg">Reserve Ticket</button>
              </div>
            </form>
          </div>
          </div>
          ';
          echo '</div>';
        }
      } else{
        header('Location: index.php');
      }
      ?>
    </div>
    <script>
      $( document ).ready(function() {
        var startTimeDOM = document.getElementById('showing-start-time');
        var startTime = startTimeDOM.innerHTML;
        startTime = startTime.slice(startTime.length-4);
        startTime = startTime.slice(0,2) + ':' + startTime.slice(2,4);
        startTimeDOM.innerHTML = startTime;
      });
    </script>
  </body>
