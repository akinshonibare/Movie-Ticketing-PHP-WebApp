<?php
  include "functions.php";
  addInfo();
?>
<?php include("header.html");?>
  <body>
    <div class="container">
        <div class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
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
