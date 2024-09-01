<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }else {
    include "phpconfiguration.php";
    $inboxField = "";
    $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if (mysqli_num_rows($sql1)>0) {
      $row = mysqli_fetch_assoc($sql1);
    }
    $id  = $row['identityNumber'];
    $id .= "@shipmail.com";


    $sql2 = mysqli_query($conn, "SELECT * FROM messages WHERE incomingMsgId = '$id' AND important = 'True' ORDER BY messageId DESC");
    if(mysqli_num_rows($sql2)>0) {
      while ($row1 = mysqli_fetch_assoc($sql2)) {
        if ($row1['incomingMsgId'] === $id) {

          $inboxField .= '<tr class="messageListItem" id="messageListItem">

                          <td style="width: 20px;" class="iconHover" data-placement="bottom" title="Important">
                          <span class="importantClick" id="importantClick"></span>
                          </td>

                          <td style="width: 20px;" class="iconHover" data-placement="bottom" title="Tasks">
                          <span class="tasksClick" id="taskClick"></span>
                          </td>

                          <td style="width: 20px;" class="iconHover" data-placement="bottom" title="Trash">
                          <span class="trashClick"><i class="fa-regular fa-trash-can"></i></span>
                          </td>

                          <td class="mailFrom">'. $row1['outgoingMsgId'].'</td>

                          <td class="mailMsg">'. $row1['message'].'</td>

                          <td class="timeSent">'. $row1['msgTime'].'</td>
                          <td class="messageIdNum" style="display: none;">'. $row1['messageId'].'</td>
                          <td class="messageImportant" style="display: none;">'. $row1['important'].'</td>
                          <td class="messageTask" style="display: none;">'. $row1['task'].'</td>
                          </tr>';
        }
      }
    }
    echo $inboxField;
  }
?>
