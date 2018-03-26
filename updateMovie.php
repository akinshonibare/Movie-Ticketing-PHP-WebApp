<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  updateMovie();
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
     <div class="container" style="padding-top:30px">
        <div class="col-sm-6">
            <h5>update movie</h5>
           <form action="updateMovie.php" method="post">
                <div class="form-group">
                   <label for="start_date">Start Date</label>
                    <input type="text" name="start_date" class="form-control">
                </div>
                <div class="form-group">
                   <label for="end_date">End Date</label>
                    <input type="text" name="end_date" class="form-control">
                </div>
                <div class="form-group">
                   <select name="movie_id" id="">
                      <?php showAllData();?>
                    </select>
                </div>
            </form>
        </div>
    </div>
   </body>
  </html>
