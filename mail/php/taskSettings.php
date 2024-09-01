<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: ../recognition/login.php");
}else {
  $msgId=$_POST['msgId'];
  $taskValue=$_POST['taskValue'];
  tasked($msgId,$taskValue);
}


function tasked($msgId, $taskValue){
  include "phpconfiguration.php";
  if ($taskValue == "True") {
    $sql = mysqli_query($conn, "UPDATE messages SET task = 'False' WHERE messageId = $msgId");
    if (mysqli_query($conn, $sql)) {
      echo "Made false";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }else {
    $sql1 = mysqli_query($conn, "UPDATE messages SET task = 'True' WHERE messageId = $msgId");
    if (mysqli_query($conn, $sql1)) {
      echo "Made true";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }

}
?>
