<?php
include "database.php";

global $connection;

session_start();
include 'functions.php';
 include("header.html");
 ?>

<body>
    <?php include("navbar.html");?>
    <section id="cover">
        <? //php showProfile();?>
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
                            <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
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
