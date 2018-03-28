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
        <div class="container-fluid"><a class="navbar-brand" href="index.php">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Showings</a></li>
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
         <h5>add movie</h5>
         <form action="addmovies.php" method="post">
       <div class="form-group">
         <input type="text" name="movie_id" class="form-control" placeholder="Movie ID">
       </div>

       <div class="form-group">
         <input type="text" name="title" class="form-control" placeholder="Title">
       </div>

       <div class="form-group">
         <input type="text" name="running_time" class="form-control" placeholder="Running Time">
       </div>

       <div class="form-group">
         <input type="text" name="rating" class="form-control" placeholder="Rating">
       </div>

       <div class="form-group">
         <input type="text" name="plot_synopsis" class="form-control" placeholder="Plot Synopsis">
       </div>

       <div class="form-group">
         <input type="text" name="director" class="form-control" placeholder="Director">
       </div>

       <div class="form-group">
         <input type="text" name="production_company" class="form-control" placeholder="Production Company">
       </div>

       <div class="form-group">
         <input type="text" name="name_of_supplier" class="form-control" placeholder="Name of Supplier">
       </div>

       <div class="form-group">
         <input type="text" name="start_date" class="form-control" placeholder="Start Date">
       </div>

       <div class="form-group">
         <input type="text" name="end_date" class="form-control" placeholder="End Date">
       </div>

       <input class="btn btn-secondary" type="submit" name="submitMovie" value="Submit">
     </form>
     </div>
   </body>
  </html>
