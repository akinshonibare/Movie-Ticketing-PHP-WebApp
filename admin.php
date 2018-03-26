<?php
  include 'functions.php';
  session_start();
  isLoggedIn();
  isAdmin();
?>
<?php include "header.html";?>
  <body style="margin-top:56px;" id="admin-wrapper-id">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
        <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Movies</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
      include "checkLogin.php";
     ?>
     <div id="wrapper">
          <!-- Sidebar -->
          <div id="sidebar-wrapper">
            <form action="admin.php" id="admin_sidebar">
              <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="#">
                          OMTS BTS
                      </a>
                  </li>
                  <li>
                      <a href="#" value="about" type="" onclick="post_nav('about');">About</a>
                  </li>
                  <li>
                      <a href="#" onclick="post_nav('users');">Users</a>
                  </li>
                  <li>
                      <a href="#" onclick="post_nav('movies');">Movies</a>
                  </li>
                  <li>
                      <a href="#" onclick="post_nav('theatres');">Theatres</a>
                  </li>
                  <li>
                      <a href="#" onclick="post_nav('complexes');">Complexes</a>
                  </li>
              </ul>
            </form>
          </div>

          <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
          <div id="page-content-wrapper" class="admin-wrapper">
              <div class="container-fluid">
                  <!-- <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a> -->
                  <h2>ADMIN</h2>
                  <?php
                    if(isset($_POST['title'])){
                      $option=$_POST['title'];
                      if($option == "users"){
                        include 'adminUser.php';
                      }elseif ($option == "movies") {
                        include 'adminMovies.php';
                        //show Movies
                      ?>
                         <table>

                         <?php
                      //
                      //   global $connection;
                      //
                      //   $query = "SELECT * FROM Movie";
                      //   $select_movie = mysqli_query($connection,$query);
                      //
                      //   while($row = mysqli_fetch_assoc($select_movie)) {
                      //       $movieId             = $row['movie_id'];
                      //       $title            = $row['title'];
                      //       $runningTime      = $row['running_time'];
                      //       $rating      = $row['rating'];
                      //       $plotSynopsis       = $row['plot_synopsis'];
                      //       $director            = $row['director'];
                      //       $productionComp      = $row['production_company'];
                      //       $supplier      = $row['name_of_supplier'];
                      //       $startDate       = $row['start_date'];
                      //       $endDate       = $row['end_date'];
                      //
                      //       echo "<tr>";
                      //       echo "<td>$movieId </td>";
                      //       echo "<td>$title</td>";
                      //       echo "<td>$runningTime</td>";
                      //       echo "<td>$rating</td>";
                      //       echo "<td>$plotSynopsis</td>";
                      //       echo "<td>$director</td>";
                      //       echo "<td>$productionComp</td>";
                      //       echo "<td>$supplier</td>";
                      //       echo "<td>$startDate</td>";
                      //       echo "<td>$endDate</td>";
                      //       echo "<td><a href='admin.php?delete={$movieId}'>Delete</a></td>";
                      //       echo "</tr>";
                      //   }

                        ?>
                        <!-- add movie -->
                      <div class="container">
                        <div class="col-sm-6">
                          <h5>add movie</h5>
                          <form action="login_create.php" method="post">

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Movie ID">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Running Time">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Rating">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Plot Synopsis">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Director">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Production Company">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Name of Supplier">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="Start Date">
                        </div>

                        <div class="form-group">
                          <input type="text" name="username" class="form-control" placeholder="movie_id">
                        </div>


                        <input class="btn btn-secondary" type="submit" name="submit" value="Submit">

                      </form>
                      </div>
                    </div>

                    <?php
                      }
                    }
                  ?>
              </div>
          </div>
          <!-- /#page-content-wrapper -->


      <!-- /#wrapper -->

      <!-- Menu Toggle Script -->
      <script>
      // $("#menu-toggle").click(function(e) {
      //     e.preventDefault();
      //     $("#wrapper").toggleClass("toggled");
      // });
      function post_nav(nav){
        console.log(nav);
        $.post( "admin.php", {title:nav},
        function( data ) {
          $( "#admin-wrapper-id" ).html( data );
        });
      }

      $("#wrapper").toggleClass("toggled");
      </script>
  </body>
</html>
