<table class="table table-hover table-striped table-responsive">
           <thead class="table-dark">
               <tr>
                   <th>Movie ID</th>
                   <th>Title</th>
                   <th>Running Time</th>
                   <th>Rating</th>
                   <th>Plot Synopsis</th>
                   <th>Director</th>
                   <th>Production Company</th>
                   <th>Name of Supplier</th>
                   <th>Start Date</th>
                   <th>End Date</th>

               </tr>
           </thead class="table-light">
                 <tbody>
<?php



global $connection;

$query = "SELECT * FROM Movie";
$select_movie = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_movie)) {
    $movieId             = $row['movie_id'];
    $title            = $row['title'];
    $runningTime      = $row['running_time'];
    $rating      = $row['rating'];
    $plotSynopsis       = $row['plot_synopsis'];
    $director            = $row['director'];
    $productionComp      = $row['production_company'];
    $supplier      = $row['name_of_supplier'];
    $startDate       = $row['start_date'];
    $endDate       = $row['end_date'];

    echo "<tr>";
    echo "<td>$movieId </td>";
    echo "<td>$title</td>";
    echo "<td>$runningTime</td>";
    echo "<td>$rating</td>";
    echo "<td>$plotSynopsis</td>";
    echo "<td>$director</td>";
    echo "<td>$productionComp</td>";
    echo "<td>$supplier</td>";
    echo "<td>$startDate</td>";
    echo "<td>$endDate</td>";
    // echo "<td><a href='deleteMovies.php'>Delete</a></td>";
    echo "<td><a href='admin.php?deleteMovie={$movieId}'>Delete</a></td>";
    echo "</tr>";
}
     ?>
