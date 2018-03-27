<table class="table table-hover table-striped table-responsive">
           <thead class="table-dark">
               <tr>

                   <th>Complex ID</th>
                   <th>Name</th>
                   <th>Street</th>
                   <th>City</th>
                   <th>Postal Code</th>

               </tr>
           </thead class="table-light">
                 <tbody>
<?php



global $connection;

$query = "SELECT * FROM Theatre_Complex";
$showComplexes = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($showComplexes)) {
    $complex_id             = $row['complex_id'];
    $name            = $row['name'];
    $street       = $row['street'];
    $city      = $row['city'];
    $pc      = $row['pc'];


    echo "<tr>";
    echo "<td>$complex_id </td>";
    echo "<td>$name</td>";
    echo "<td>$street</td>";
    echo "<td>$city</td>";
    echo "<td>$pc</td>";
    echo "</tr>";
}
     ?>
