<?php
include "database.php";
include "updateCustomer.php";
//updateCust();
//global $connection;

include 'functions.php';
isLoggedIn();
include("header.html");
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
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="profile.php">Profile</a></li>';
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
    <section id="cover" style="margin-top:56px;">
        <?php
        $userQuery = "SELECT * FROM Customer WHERE account_number=".$_SESSION["account number"];
        $userResult = mysqli_query($connection, $userQuery);
        $row = mysqli_fetch_row($userResult);
        //$_SESSION["account_number"] = $row[0];
        ?>

      <div class="container">
			<div class="row">
				<div class="main-login main-center" style="width:100%;margin-bottom:40px;">

					<form method="post" action="updateCustomer.php" class="text-center">

						<div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label class="control-label">First Name</label>
							<div class="">
								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="first_name"  value="<?php echo ''.$row[2].''; ?> " disabled="true">
								</div>
							</div>
						</div>

            <div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label for="last_name" class="cols-sm-2 control-label">Last Name</label>

								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo ''.$row[3].''; ?>" disabled="true">
								</div>

						</div>

            <div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label for="new_password" class="cols-sm-2 control-label">Current Password</label>

								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="current_password" id="current_password"  placeholder="Enter your Password">
								</div>

						</div>

						<div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label for="new_password" class="cols-sm-2 control-label">New Password </label>

								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="new_password" id="new_password"  placeholder="Enter your Password">
								</div>

						</div>

						<div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label for="confirm_password" class="cols-sm-2 control-label">Confirm Password</label>

								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_password" id="confirm_password"  placeholder="Confirm your Password">
								</div>

						</div>

            <div class="form-group col-sm-12 col-md-6 offset-md-3">
							<label for="street" class="cols-sm-2 control-label">Street</label>

								<div class="input-group">
									<span class="input-group-addon"><i class="edit-icon fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="street" id="street"  value="<?php echo ''.$row[4].''; ?> ">
								</div>

							</div>

              <div class="form-group col-sm-12 col-md-6 offset-md-3">
  							<label for="city" class="cols-sm-2 control-label">City</label>

  								<div class="input-group">
  									<span class="input-group-addon"><i class="edit-icon fa fa-users fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="city" id="city"  value="<?php echo ''.$row[5].''; ?>">
  								</div>

              </div>

                <div class="form-group col-sm-12 col-md-6 offset-md-3">
    							<label for="postal_code" class="cols-sm-2 control-label">Postal Code</label>

    								<div class="input-group">
    									<span class="input-group-addon"><i class="edit-icon fa fa-users fa" aria-hidden="true"></i></span>
    									<input type="text" class="form-control" name="postal_code" id="postal_code"  value="<?php echo ''.$row[6].''; ?>">
    								</div>

                </div>


						<div class="form-group col-sm-12">
              <input class ="btn btn-success" type="submit" name="submit" value="Submit Changes" style="">
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
