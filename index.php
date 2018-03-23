<?php
session_start();
?>
<?php
include 'functions.php';
?>
<?php include("header.html");?>
<body>
    <?php include("navbar.html");?>
    <section id="cover">
        <?php
        global $connection;

        echo '<div class="showings-jumbo jumbotron">
                <h1 class="display-4">Movies</h1>
              </div>
        ';
        $complexQuery = "SELECT * FROM Theatre_Complex";
        $complexResult = mysqli_query($connection, $complexQuery);
        // Complex Selector

        echo '
          <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                  <form action="index.php" id="movie_complex">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <button class="btn btn-success" type="button submit">Select Complex</button>
                      </div>
                        <select class="custom-select" id="complex_select" name="complex_select">
                          <option selected>Choose...</option>';
                          while ($row = mysqli_fetch_array($complexResult, MYSQLI_ASSOC)) {
                            echo '<option value="'.$row["complex_id"].'">'.$row["name"].'</option>';
                          }
                            echo '
                        </select>
                    </div>
                  </form>
                </div>
              </div>
            <div class="row">
                  ';
        $query = "SELECT * FROM Movie";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          echo '<div class="col-xs-12 col-sm-4 col-md-3 text-center">';
          $image="movie_images/".$row["movie_id"].".jpg";
          echo "<img src= '$image'/>";
          echo "<br>";
          echo "Movie Title: ".$row["title"]."<br>";
          echo "Running Time: ".$row["running_time"]."<br>";
          echo "Rating: ".$row["rating"]."<br>";
          echo "ID: ".$row["movie_id"]."<br>";
          echo "</div>";
        }
        echo '</div';
        echo '</div>';
        echo '</div>';
        ?>
        <?php
        if (isset($_GET['complex_select'])) {
            $complexID = $_GET['complex_select'];
            $complex_Query = "SELECT * FROM Theatre_Complex WHERE complex_id=".$complexID;
            $complexResult = mysqli_query($connection, $complex_Query);
            $row = mysqli_fetch_row($complexResult);
            echo
            '
              <div class="row" style="background-color:#ffd7b0">
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h2>'.$row[1].'</h2>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>Street: '.$row[2].'</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>City: '.$row[3].'</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                  <h4>Postal Code: '.$row[4].'</h4>
                </div>
              </div>
            ';
        }
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
