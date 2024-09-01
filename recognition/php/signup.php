<?php
  session_start();
  include_once "phpconfiguration.php";
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $identityNumber = mysqli_real_escape_string($conn, $_POST['identityNumber']);
  $dept = mysqli_real_escape_string($conn, $_POST['dept']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!empty($firstname) && !empty($lastname) && !empty($identityNumber) && !empty($dept) && !empty($dept)){
    $sql = mysqli_query($conn, "SELECT identityNumber FROM users WHERE identityNumber = '{$identityNumber}'");

    if (mysqli_num_rows($sql) > 0) {
      echo "$identityNumber - This Identity Number is already registered, please login";
    }else {
      $status = "Active";
      $random_id = rand(time(), 10000000);

      $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, identityNumber, dept, password, status)
                           VALUES ({$random_id}, '{$firstname}', '{$lastname}', '{$identityNumber}', '{$dept}', '{$password}', '{$status}')");
      if ($sql2) {
        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE identityNumber = '{$identityNumber}'");
        if ( mysqli_num_rows($sql3) > 0) {
          $row = mysqli_fetch_assoc($sql3);
          $_SESSION['unique_id'] = $row['unique_id'];
          echo "Success";
        }
      }else {

      }
    }
  }else {
    echo "All fields are required";
  }
?>
