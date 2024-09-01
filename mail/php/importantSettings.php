<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: ../recognition/login.php");
}else {
  $msgId=$_POST['msgId'];
  $importantValue=$_POST['importantValue'];
  importantUnimportant($msgId,$importantValue);
}


function importantUnimportant($msgId, $importantValue){
  include "phpconfiguration.php";
  if ($importantValue == "True") {
    $sql = mysqli_query($conn, "UPDATE messages SET important = 'False' WHERE messageId = $msgId");
    if (mysqli_query($conn, $sql)) {
      echo "Made false";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }else {
    $sql1 = mysqli_query($conn, "UPDATE messages SET important = 'True' WHERE messageId = $msgId");
    if (mysqli_query($conn, $sql1)) {
      echo "Made true";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }

}
?>
