<?php
session_start();
include "database.php";
include "updateCustomer.php";
//updateCust();
//global $connection;


include 'functions.php';
 include("header.html");
 ?>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- Website CSS style -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/style2.css">
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include("navbar.html");?>
    <section id="cover">
        <?php
        $userQuery = "SELECT * FROM Customer WHERE account_number=".$_SESSION["account number"];
        $userResult = mysqli_query($connection, $userQuery);
        $row = mysqli_fetch_row($userResult);
        //$_SESSION["account_number"] = $row[0];
        ?>

        <div class="container">
			<div class="row main">
				<div class="main-login main-center">

					<form method="post" action="updateCustomer.php">

						<div class="form-group">
							<label class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="first_name"  value="<?php echo ''.$row[2].''; ?> " disabled="true">
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="last_name" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo ''.$row[3].''; ?>" disabled="true">
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="new_password" class="cols-sm-2 control-label">Current Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="current_password" id="current_password"  placeholder="Enter your Password">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="new_password" class="cols-sm-2 control-label">New Password </label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="new_password" id="new_password"  placeholder="Enter your Password">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm_password" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_password" id="confirm_password"  placeholder="Confirm your Password">
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="street" class="cols-sm-2 control-label">Street</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="street" id="street"  value="<?php echo ''.$row[4].''; ?> ">
								</div>
              </div>
							</div>

              <div class="form-group">
  							<label for="city" class="cols-sm-2 control-label">City</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="city" id="city"  value="<?php echo ''.$row[5].''; ?>">
  								</div>
  							</div>
                <div class="form-group">
    							<label for="postal_code" class="cols-sm-2 control-label">Postal Code</label>
    							<div class="cols-sm-10">
    								<div class="input-group">
    									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
    									<input type="text" class="form-control" name="postal_code" id="postal_code"  value="<?php echo ''.$row[6].''; ?>">
    								</div>
    							</div>
                </div>

						<div class="form-group ">
              <input class ="btn btn-success" type="submit" name="submit" value="Submit Changes" style="float:left;">
							<!--<a href="" target="_blank" type="button" name="submit" id="submit" class="btn btn-primary btn-lg btn-block login-button">Submit Changes</a>-->
						</div>

					</form>


				</div>
			</div>
		</div>

    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
