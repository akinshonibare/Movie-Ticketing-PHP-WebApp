<?php
  include "functions.php";
  addInfo();
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
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
           <h1>create account</h1>
            <form action="signUp.php" method="post">
                <div class="form-group">
                   <label for="firstName">First Name</label>
                    <input type="text" name="firstName" class="form-control">
                </div>
                <div class="form-group">
                   <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" class="form-control">
                </div>
                <div class="form-group">
                   <label for="street">Street</label>
                    <input type="text" name="street" class="form-control">
                </div>
                <div class="form-group">
                   <label for="city">City</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="form-group">
                   <label for="pc">Postal Code</label>
                    <input type="text" name="pc" class="form-control">
                </div>
                <div class="form-group">
                   <label for="phoneNumber">Phone Number</label>
                    <input type="text" name="phoneNumber" class="form-control">
                </div>
                <div class="form-group">
                   <label for="creditCardNumber">Credit Card Number</label>
                    <input type="text" name="creditCardNumber" class="form-control">
                </div>
                <div class="form-group">
                   <label for="creditCardExpiry">Credit Card Expiry(MMYY)</label>
                    <input type="text" name="creditCardExpiry" class="form-control">
                </div>
                <div class="form-group">
                   <label for="creditCardCVC">CVC</label>
                    <input type="text" name="creditCardCVC" class="form-control">
                </div>
                <div class="form-group">
                   <label for="accountNumber">Account Number</label>
                    <input type="text" name="accountNumber" class="form-control">
                </div>
                <div class="form-group">
                   <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
