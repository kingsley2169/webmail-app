<?php
  session_start();
  include_once "phpconfiguration.php";
  $identityNumber = mysqli_real_escape_string($conn, $_POST['identityNumber']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!empty($identityNumber) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE identityNumber = '{$identityNumber}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
      $_SESSION['unique_id'] = $row['unique_id'];
      echo "Success";
    }else {
      echo "Email or Password is incorrect"; 
    }
  }else {
    echo "All input fields are required"; 
  }
?>
