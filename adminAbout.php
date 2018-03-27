<?php

?>
  <div class='container'>
    <div class='row'>
      <div class='col'>
    <?php
  echo "<h3>Most Popular Movie</h3>";
  $res_query = "SELECT movie_id, COUNT(movie_id) AS num_reservation, SUM(num_tickets_reserved) AS tickets FROM Reservations GROUP BY movie_id ORDER BY tickets DESC LIMIT 1;";
  $res = mysqli_query($connection, $res_query);

  while($row = mysqli_fetch_assoc($res)) {
      $movie_id         = $row['movie_id'];
      $num_reservation  = $row['num_reservation'];
      $num_tickets          = $row['tickets'];
    }

    $image="movie_images/".$movie_id.".jpg";
    echo "<img src= '$image'/>";
    echo "<br>";

    echo "movie ID: $movie_id";
    echo "<br>";
    echo "number of reservations: $num_reservation";
    echo "<br>";
    echo "number of tickets: $num_tickets";
?>
        </div>
      <div class='col'>
        <?php
            echo "<h3>Most Popular Theatre Complex</h3>";
            $res_query = "SELECT complex_id, SUM(num_tickets_reserved) AS tickets FROM Reservations GROUP BY complex_id ORDER BY tickets DESC LIMIT 1;";
            $result = mysqli_query($connection, $res_query);

            while($row = mysqli_fetch_assoc($result)) {
                $complex_id         = $row['complex_id'];
                $tickets  = $row['tickets'];
              }

            $res_query = "SELECT * FROM Theatre_Complex WHERE complex_id = '$complex_id'";
            $result2 = mysqli_query($connection, $res_query);

            while($row = mysqli_fetch_assoc($result2)) {
                $name         = $row['name'];
                $street        = $row['street'];
                $city         = $row['city'];
                $pc  = $row['pc'];
              }

              echo "<h4>$name</h4>";
              echo "<h6>complex ID: $complex_id</h6>";
              echo "<h6>street: $street</h6>";
              echo "<h6>city: $city</h6>";
              echo "<h6>postal code: $pc</h6>";
         ?>

              <a style="margin:20px"class="btn btn-secondary" href="addshowing.php" role="button">Add Showing</a>

      </div>
    </div>
<?php

 ?>
