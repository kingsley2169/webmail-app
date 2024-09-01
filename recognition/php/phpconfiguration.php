<?php
  $conn = mysqli_connect("localhost", "root", "xiQ8ZNrs6WLCizs8", "webmail");
  if (!$conn) {
    echo "Database Connected" . mysqli_connect_error();
  }
?>
