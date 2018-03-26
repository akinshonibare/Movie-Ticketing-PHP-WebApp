<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>OMTS</title>

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php
include "database.php";

global $connection;

session_start();
include 'functions.php';
 ?>

<body>
    <?php include("navbar.html");?>
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
                <div class="span2" >
        		    <img src="https://secure.gravatar.com/avatar/de9b11d0f9c0569ba917393ed5e5b3ab?s=140&r=g&d=mm" class="img-circle">
                </div>

                <div class="span8">
                    <h2> <?php echo ''.$row[2].' '.$row[3].''; ?></h2>
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
                        <ul class="dropdown-menu">
                            <li><a href="edituser.php"><span class="icon-wrench"></span> Modify</a></li>
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
