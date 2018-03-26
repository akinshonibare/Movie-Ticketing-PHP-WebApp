<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  include "header.html";
?>

  <body style="margin-top:56px;" id="admin-wrapper-id">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
        <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Showings</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
if(isset($_GET['reservation'])) {
    global $connection;
    $resAC      = $_GET['reservation'];

    $query = "SELECT * FROM Reservations WHERE account_number = $resAC";

    $result = mysqli_query($connection, $query);
?>

    <div class="container" style="margin-top:100px">
      <?php
      echo "<h3>Reservations for $resAC</h3>";
      ?>
    <table class="table table-hover table-striped" style="padding-top:50px">
               <thead class="table-dark">
                   <tr>
                       <th>Reservation Number</th>
                       <th>Number of Tickets Reserved</th>
                       <th>Showing Id</th>
                       <th>Movie Id</th>
                       <th>Complex Id</th>
                       <th>Theatre Number</th>

                   </tr>
               </thead class="table-light">
                     <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
        $reservation_number             = $row['reservation_number'];
        $num_tickets_reserved            = $row['num_tickets_reserved'];
        $showing_id      = $row['showing_id'];
        $movie_id      = $row['movie_id'];
        $complex_id       = $row['complex_id'];
        $theatre_num       = $row['theatre_num'];

        echo "<tr>";

        echo "<td>$reservation_number </td>";
        echo "<td>$num_tickets_reserved</td>";
        echo "<td>$showing_id</td>";
        echo "<td>$movie_id</td>";
        echo "<td>$complex_id</td>";
        echo "<td>$theatre_num</td>";
        echo "</tr>";

    }

         ?>
               </tbody>
               </table>
               </div>


    <?php


  }

 ?>
