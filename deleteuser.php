<?php
  session_start();
  include "functions.php";
  isLoggedIn();
  isAdmin();
  deleteUser();
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
            <h5>delete user by account number</h5>
           <form action="deleteuser.php" method="post">
                <div class="form-group">
                   <select name="account_number" id="">
                      <?php showAllAC();?>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="delete" value="Delete">
            </form>
            <button type="button" class="btn btn-dark" style="margin-top:30px" onclick="goBack()">Go Back</button>
        </div>

    </div>



    <script>
      function goBack() {
      window.history.back();
      }
    </script>
   </body>
  </html>
