<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  updateComplex();
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
     <div class="container" style="padding-top:30px">
        <div class="col-sm-6">
            <h5>update complex</h5>
           <form action="updateComplex.php" method="post">
                <div class="form-group">
                   <label for="name">name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">

                <div class="form-group">
                  <label for="complex_id">Select Complex</label>
                   <select name="complex_id" id="">
                      <?php showComplexID();?>
                    </select>
                </div>

                <input class="btn btn-secondary" type="submit" name="updateComplex" value="Submit">
            </form>
        </div>
    </div>
   </body>
  </html>