<table class="table table-hover table-striped table-responsive">
           <thead class="table-dark">
               <tr>
                   <th>Movie ID</th>
                   <th>Account</th>
                   <th>Review</th>

               </tr>
           </thead class="table-light">
                 <tbody>
<?php

$query = "SELECT movie_id, account_number, body FROM Movie_Reviews";
$reviews = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($reviews)) {
    $movie_id             = $row['movie_id'];
    $account_number            = $row['account_number'];
    $review      = $row['body'];

    echo "<tr>";

    echo "<td>$movie_id </td>";
    echo "<td>$account_number</td>";
    echo "<td>$review</td>";
    echo "<td><a href='admin.php?deleteReview={$movie_id}&account_number={$account_number}'>Delete</a></td>";
    echo "</tr>";

}

     ?>
           </tbody>
           </table>


<?php
?>
