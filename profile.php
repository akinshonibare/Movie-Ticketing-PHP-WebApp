<?php
session_start();
include 'functions.php';
include("header.html");
isLoggedIn();
global $connection;
 ?>



<body>
    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#808080;">
        <div class="container-fluid"><a class="navbar-brand" href="#">OMTS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <?php
                    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                      echo '<li class="nav-item" role="presentation"><a class="nav-link" href="showing.php">Showings</a></li>';
                      echo '<li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>';
                    } else {
                      echo '<li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Login</a></li>';
                    }
                    ?>
                    <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){
                      echo '<li class="nav-item" role="presentation"><a class="nav-link" href="admin.php">Admin</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <section id="cover">
        <?php
        echo '<div class="showings-jumbo jumbotron">
                <h1 class="display-4">Your Profile</h1>
              </div>
        ';
        $userQuery = "SELECT * FROM Customer WHERE account_number=".$_SESSION["account number"];
        $userResult = mysqli_query($connection, $userQuery);
        $row = mysqli_fetch_row($userResult);
        ?>
        <div class="container-fluid well span6" style=" width: 50%;  text-align: center; margin-right: 25%; margin-left:25%;" >
        	<div class="row-fluid">
                <div class="span8">
                    <h2>Name: <?php echo ''.$row[2].' '.$row[3].''; ?></h2>
                    <h4>Street: <?php echo ''.$row[4].''; ?></h4>
                    <h4>Postal Code : <?php echo ''.$row[6].''; ?></h4>
                    <h4>City: <?php echo ''.$row[5].''; ?></h4>
                </div>

                <div class="span2">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                            Action
                            <span class="icon-cog icon-white"></span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu text-center">
                            <li><a href="edituser.php"><i class="fa fa-wrench"></i> Modify</a></li>
                            <li><a href="reservations.php"><span class="fas fa-archive"></span> Your Orders</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
