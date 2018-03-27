<table class="table table-hover table-striped table-responsive">
           <thead class="table-dark">
               <tr>

                   <th>Theatre Number</th>
                   <th>Max Seats</th>
                   <th>Screen Size</th>
                   <th>Complex ID</th>

               </tr>
           </thead class="table-light">
                 <tbody>
<?php



global $connection;

$query = "SELECT * FROM Theatre";
$showTheatres = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($showTheatres)) {
    $theatre_num             = $row['theatre_num'];
    $max_seats            = $row['max_seats'];
    $screen_size      = $row['screen_size'];
    $complex_id      = $row['complex_id'];


    echo "<tr>";
    echo "<td>$theatre_num </td>";
    echo "<td>$max_seats</td>";
    echo "<td>$screen_size</td>";
    echo "<td>$complex_id</td>";
    echo "</tr>";
}
     ?>
