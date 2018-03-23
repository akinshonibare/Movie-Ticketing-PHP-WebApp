<?php
  include 'functions.php';
  session_start();
  isLoggedIn();
?>
<?php include("header.html");?>
  <body>
    <h1>Home</h1>
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
        <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                  <?php if($_SESSION["isAdmin"] == 1){
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="admin.php">Admin</a></li>';
                  }
                  ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
      include "checkLogin.php";
      echo "First Name: " . $_SESSION["first name"]. "<br>";
      echo "Last Name: " . $_SESSION["last name"] . "<br>";
      echo "admin " . $_SESSION["isAdmin"] . "<br>";
     ?>
  </body>
</html>
