<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  addMovie();
  deleteMovie();
  deleteMovie2();
  deleteUser2();
?>

<?php include "header.html";?>
  <body style="margin-top:56px;" id="admin-wrapper-id">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
        <div class="container-fluid"><a class="navbar-brand" href="index.php">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                  <h2 style="margin-left:20px">ADMIN</h2>
                  <?php
                    if(isset($_POST['title'])){
                      $option=$_POST['title'];
                      if($option == "users"){
                        include 'adminUser.php';
                      }elseif ($option == "about") {
                        include 'adminAbout.php';
                      }elseif ($option == "complexes") {
                        include 'adminComplexes.php';
                        ?>
                           <table>
                          <div class="container" style="padding-top:25px">
                            <div class="row">
                              <div class="col">
                                <a class="btn btn-secondary" href="addComplex.php" role="button">Add Complex</a>
                              </div>
                              <div class="col">
                                <a class="btn btn-secondary" href="updateComplex.php" role="button">Update Complex</a>
                              </div>
                              <div class="col-sm">
                                <!-- <a class="btn btn-secondary" href="deletemovies.php" role="button">Delete Movie</a> -->
                              </div>
                            </div>
                            </div>
                      <?php
                      }elseif ($option == "theatres") {
                        include 'adminTheatres.php';
                        ?>
                           <table>
                          <div class="container" style="padding-top:25px">
                            <div class="row">
                              <div class="col">
                                <a class="btn btn-secondary" href="addtheatre.php" role="button">Add Theatre</a>
                              </div>
                              <div class="col">
                                <a class="btn btn-secondary" href="updatetheatre.php" role="button">Update Theatre</a>
                              </div>
                              <div class="col-sm">
                                <!-- <a class="btn btn-secondary" href="deletemovies.php" role="button">Delete Movie</a> -->
                              </div>
                            </div>
                            </div>
                      <?php
                      }elseif ($option == "movies") {
                        include 'adminMovies.php';

                      ?>
                         <table>
                        <div class="container" style="padding-top:25px">
                          <div class="row">
                            <div class="col-sm">
                              <a class="btn btn-secondary" href="addmovies.php" role="button">Add Movie</a>
                            </div>
                            <div class="col-sm">
                              <a class="btn btn-secondary" href="deletemovies.php" role="button">Delete Movie</a>
                            </div>
                            <div class="col-sm">
                              <a class="btn btn-secondary" href="updatemovie.php" role="button">Update Movie</a>
                            </div>
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
