<table class="table table-hover table-striped">
           <thead class="table-dark">
               <tr>
                   <th>Account Number</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Street</th>
                   <th>Phone Number</th>
                   <th>Reservations</th>

               </tr>
           </thead class="table-light">
                 <tbody>
<?php

$query = "SELECT account_number, first_name, last_name, street, phone_number FROM Customer";

$select_users = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_users)) {
    $accountNumber             = $row['account_number'];
    $firstName            = $row['first_name'];
    $lastName      = $row['last_name'];
    $street      = $row['street'];
    $phoneNumber       = $row['phone_number'];

    $res_query = "SELECT COUNT(account_number) FROM Reservations where account_number = '$accountNumber'";
    $res = mysqli_query($connection, $res_query);
    if($res->num_rows == 0){
      $reservation = 0;
    }else{
      $row = mysqli_fetch_row($res);
      $reservation = $row[0];
    }

    echo "<tr>";

    echo "<td>$accountNumber </td>";
    echo "<td>$firstName</td>";
    echo "<td>$lastName</td>";
    echo "<td>$street</td>";
    echo "<td>$phoneNumber</td>";
    echo "<td><a href='cusReservation.php?reservation={$accountNumber}'>$reservation</a></td>";
    // echo "<td><a href='deleteuser.php'>Delete</a></td>";
    echo "<td><a href='admin.php?delete={$accountNumber}'>Delete</a></td>";



    // echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    // echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
    // echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
    // echo "<td><a href='users.php?delete={$accountNumber}'>Delete</a></td>";
    echo "</tr>";

}

     ?>
           </tbody>
           </table>


<?php
?>
