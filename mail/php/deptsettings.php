<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }
?>
<?php include 'phpconfiguration.php'; ?>
<?php

    $newdept = mysqli_real_escape_string($conn, $_POST['newdept']);

      $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql1)>0) {
        $row = mysqli_fetch_assoc($sql1);
      }
        $sql = mysqli_query($conn, "UPDATE users SET dept = '$newdept' WHERE unique_id = {$_SESSION['unique_id']}");
        if ($sql) {
          echo "Success";
        }else {
          echo "Email or Password is incorrect";
        }

?>
