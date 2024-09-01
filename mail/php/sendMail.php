<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }else {
    include "phpconfiguration.php";
    $senderId = mysqli_real_escape_string($conn, $_POST['senderId']);
    $recieverId = mysqli_real_escape_string($conn, $_POST['recieverId']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $messageField = mysqli_real_escape_string($conn, $_POST['textContent']);
    $dateSent = date('Y-m-d');
    date_default_timezone_set("Europe/Istanbul");
    $timeSent = date("h:i");
    $important = "False";
    $tasks = "False";


    if (!empty($messageField)) {
      $sql = mysqli_query($conn, "INSERT INTO messages (incomingMsgId, outgoingMsgId, subject, message, msgDate, msgTime, important, task)
                          VALUES ('{$recieverId}', '{$senderId}', '{$subject}', '{$messageField}', '{$dateSent}', '{$timeSent}', '{$important}', '{$tasks}')");
                          echo "Success";
    }
  }
?>
