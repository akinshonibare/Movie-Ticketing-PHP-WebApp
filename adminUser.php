<table class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>Account Number</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Street</th>
                   <th>Phone Number</th>
                   <th>Reservations</th>
               </tr>
           </thead>
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

    echo "<tr>";

    echo "<td>$accountNumber </td>";
    echo "<td>$firstName</td>";
    echo "<td>$lastName</td>";
    echo "<td>$street</td>";
    echo "<td>$phoneNumber</td>";
    echo "<td> unknown </td>";


    // echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    // echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
    // echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
    echo "<td><a href='users.php?delete={$accountNumber}'>Delete</a></td>";
    echo "</tr>";

}

     ?>
           </tbody>
           </table>


<?php

// if(isset($_GET['change_to_admin'])) {
//
//    $the_user_id = escape($_GET['change_to_admin']);
//
//    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id   ";
//    $change_to_admin_query = mysqli_query($connection, $query);
//    header("Location: users.php");
//
//
// }

// if(isset($_GET['change_to_sub'])){
//
//    $the_user_id = escape($_GET['change_to_sub']);
//
//
//    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id   ";
//    $change_to_sub_query = mysqli_query($connection, $query);
//    header("Location: users.php");
//
//
//
// }

// if(isset($_GET['delete'])){
//
//    if(isset($_SESSION['user_role'])) {
//
//        if($_SESSION['user_role'] == 'admin') {
//
//        $the_user_id = escape($_GET['delete']);
//
//        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
//        $delete_user_query = mysqli_query($connection, $query);
//        header("Location: users.php");
//
//            }
//
//
//        }
//
//
//    }

?>
