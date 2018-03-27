<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  addComplex();
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
         <h5>add complex</h5>
         <form action="addComplex.php" method="post">
       <div class="form-group">
         <input type="text" name="complex_id" class="form-control" placeholder="Complex ID">
       </div>

       <div class="form-group">
         <input type="text" name="name" class="form-control" placeholder="Complex Name">
       </div>

       <div class="form-group">
         <input type="text" name="street" class="form-control" placeholder="Street">
       </div>
       <div class="form-group">

         <div class="form-group">
           <input type="text" name="city" class="form-control" placeholder="City">
         </div>
         <div class="form-group">

           <div class="form-group">
             <input type="text" name="pc" class="form-control" placeholder="Postal Code">
           </div>
           <div class="form-group">

       <input class="btn btn-secondary" type="submit" name="submitComplex" value="Submit">
     </form>
     </div>
   </body>
  </html>
