<?php
  include "checkLogin.php";
?>
<?php include("header.html");?>

  <body>
    <div class="container-fluid">
      <div class ="row">
        <div class="login-wrap col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 ">
          <h1>Login</h1>
          <form action = "login.php" method = "post">
              <div class = "form-group">
                <input type="text" name="username" class="form-control" placeholder="Account Number">
              </div>
              <div class = "form-group">
                <input type="password" name="password" class="form-control" placeholder="password">
              </div>
              <input class ="btn btn-success" type="submit" name="submit" value="submit" style="float:left;">
          </form>
          <form action="signUp.php" method="get">
            <button class ="btn btn-primary" type="submit" formtarget"_blank" style="float:right;">Create Account</button>
          </form>
          <?php
            if(isset($_GET["loginFailed"])){
              echo('
              <div class="text-center" style = "color:red">
                <p>Incorrect username or password.</p>
              </div>
              ');
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
