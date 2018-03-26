<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  addMovie();
?>

<?php include "header.html";?>
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
      include "checkLogin.php";
     ?>
     <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Movie ID</th>
                        <th>Title</th>
                        <th>Running Time</th>
                        <th>Rating</th>
                        <th>Plot Synopsis</th>
                        <th>Director</th>
                        <th>Production Company</th>
                        <th>Name of Supplier</th>
                        <th>Start Date</th>
                        <th>End Date</th>

                    </tr>
                </thead>
                      <tbody>
     <?php



     global $connection;

     $query = "SELECT * FROM Movie";
     $select_movie = mysqli_query($connection,$query);

     while($row = mysqli_fetch_assoc($select_movie)) {
         $movieId             = $row['movie_id'];
         $title            = $row['title'];
         $runningTime      = $row['running_time'];
         $rating      = $row['rating'];
         $plotSynopsis       = $row['plot_synopsis'];
         $director            = $row['director'];
         $productionComp      = $row['production_company'];
         $supplier      = $row['name_of_supplier'];
         $startDate       = $row['start_date'];
         $endDate       = $row['end_date'];

         echo "<tr>";
         echo "<td>$movieId </td>";
         echo "<td>$title</td>";
         echo "<td>$runningTime</td>";
         echo "<td>$rating</td>";
         echo "<td>$plotSynopsis</td>";
         echo "<td>$director</td>";
         echo "<td>$productionComp</td>";
         echo "<td>$supplier</td>";
         echo "<td>$startDate</td>";
         echo "<td>$endDate</td>";
         echo "<td><a href='admin.php?delete={$movieId}'>Delete</a></td>";
         echo "</tr>";
     }
          ?>

   </body>
  </html>
