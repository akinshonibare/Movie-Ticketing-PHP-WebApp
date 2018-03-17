<?php
  include "checkLogin.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title></title>
    <style>
    body {
      background-color: linen;
    }
    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class ="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
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
          <form action="/create_account.php" method="get">
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
