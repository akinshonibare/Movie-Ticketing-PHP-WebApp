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

    echo "$movie_id";
    echo "<br>";
    echo "$num_reservation";
    echo "<br>";
    echo "$num_tickets";


 ?>
