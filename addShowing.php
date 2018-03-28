<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  addShowing();
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
         <h5>add showing</h5>
         <form action="addShowing.php" method="post">
       <div class="form-group">
         <input type="text" name="showing_id" class="form-control" placeholder="Showing ID">
       </div>

       <div class="form-group">
         <input type="text" name="showing_date" class="form-control" placeholder="Showing Date">
       </div>

       <div class="form-group">
         <input type="text" name="movie_id" class="form-control" placeholder="Movie ID">
       </div>
       <div class="form-group">

         <div class="form-group">
           <input type="text" name="complex_id" class="form-control" placeholder="Complex ID">
         </div>
         <div class="form-group">

           <div class="form-group">
             <input type="text" name="start_time" class="form-control" placeholder="Start Time">
           </div>
           <div class="form-group">

             <div class="form-group">
               <input type="text" name="theatre_num" class="form-control" placeholder="Theatre Number">
             </div>
             <div class="form-group">

               <div class="form-group">
                 <input type="text" name="seats_available" class="form-control" placeholder="Seats Available">
               </div>
               <div class="form-group">

       <input class="btn btn-secondary" type="submit" name="submitShowing" value="Submit">
     </form>
     </div>
   </body>
  </html>
