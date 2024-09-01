<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }
?>
<?php include 'phpconfiguration.php'; ?>
<?php

    $oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

    if (!empty($oldpassword) && !empty($newpassword)) {
      $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql1)>0) {
        $row = mysqli_fetch_assoc($sql1);
      }
      if ($oldpassword == $row['password']) {
        $sql = mysqli_query($conn, "UPDATE users SET password = '$newpassword' WHERE unique_id = {$_SESSION['unique_id']}");
        if ($sql) {

          echo "Success";
        }else {
          echo "Email or Password is incorrect";
        }
      }else {
        echo "Old password is incorrect";
      }
    }else {
      echo "All Passwords fields are required";
    }


?>
