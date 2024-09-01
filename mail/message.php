<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }
  if(isset($_GET['sendMessageId'])){
        $data=$_GET['sendMessageId'];
        include_once "php/phpconfiguration.php";
        $sql = mysqli_query($conn, "SELECT * FROM messages WHERE messageId = {$data}");
        if (mysqli_num_rows($sql)>0) {
          $row = mysqli_fetch_assoc($sql);
        }
        //<script type="text/javascript">document.getElementById('senderDetailsSubject').style.display = 'none';</script>
 }

 if (isset($_GET['sentMessageId'])) {
        $sentData=$_GET['sentMessageId'];
        include_once "php/phpconfiguration.php";
        $sql = mysqli_query($conn, "SELECT * FROM messages WHERE messageId = {$sentData}");
        if (mysqli_num_rows($sql)>0) {
          $row1 = mysqli_fetch_assoc($sql);
        }
 }
?>

<?php include_once 'header_mail.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" href="styles/message.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>


    <!-- horizontal navbar -->


    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="navbar-collapse collapse  order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav ml-auto" style="margin-left: 25px;">
            <li class="nav-item">
              <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4"><i class="fa fa-bars mr-2"></i></button>
            </li>
          </ul>
        </div>

        <div class="navbar-collapse collapse order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto" style="margin-right: 25px;">
                <li class="nav-item">
                  <button onclick="location.href='settings.php'" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4"><i class="fa fa-gear mr-2"></i></button>
                </li>
            </ul>
        </div>

    </nav>


    <!-- Page content holder -->
    <div class="page-content p-5" id="content">

      <!-- Vertical navbar -->
      <div class="vertical-nav bg-white" id="sidebar">
        <br>
        <button onclick="location.href='sendMail.php'" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4" style="margin: 0 auto; display: block;">Compose</button>
        <br>
        <ul class="nav flex-column bg-white mb-0">
          <li class="nav-item">
            <a href="inbox.php" class="nav-link text-dark font-italic">
                      <i class="fa fa-inbox mr-3 text-primary fa-fw"></i>
                      Inbox
            </a>
          </li>
          <li class="nav-item">
            <a href="outbox.php" class="nav-link text-dark font-italic">
                      <i class="fa fa-paper-plane mr-3 text-primary fa-fw"></i>
                      Sent
            </a>
          </li>
          <li class="nav-item">
            <a href="important.php" class="nav-link text-dark font-italic">
                      <i class="fa fa-tag mr-3 text-primary fa-fw"></i>
                      Important
                  </a>
          </li>
          <li class="nav-item">
            <a href="tasks.php" class="nav-link text-dark font-italic">
                      <i class="fa-solid fa-bars-progress mr-3 text-primary fa-fw"></i>
                      Tasks
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-trash mr-3 text-primary fa-fw"></i>
                      Trash
                  </a>
          </li>

        </ul>

      </div>
      <!-- End vertical navbar -->

      <div class="main">
        <?php if (isset($_GET['sendMessageId'])):?>
        <div class="senderDetailsSubject">
          <h6 class="senderIdentity">From: <?php echo $row['outgoingMsgId']?></h6>
          <h6 class="senderIdentity">Date and Time Recieved: <?php echo $row['msgDate']?>(<?php echo $row['msgTime']?>)</h6>
          <br>
          <h2 class="messageSubject"><?php echo $row['subject']?></h2>
        </div>
        <?php elseif (isset($_GET['sentMessageId'])):?>
          <div class="senderDetailsSubject">
            <h6 class="senderIdentity">To: <?php echo $row1['incomingMsgId']?></h6>
            <h6 class="senderIdentity">Date and Time Sent: <?php echo $row1['msgDate']?>(<?php echo $row1['msgTime']?>)</h6>
            <br>
            <h2 class="messageSubject"><?php echo $row1['subject']?></h2>
          </div>
        <?php endif; ?>
        <hr>

        <div class="messageContent">
          <?php if (isset($_GET['sendMessageId'])):  ?>
          <p><?php echo $row['message']?></p>
        <?php elseif (isset($_GET['sentMessageId'])): ?>
          <p><?php echo $row1['message']?></p>
        <?php endif; ?>
        </div>
      </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        <?php require_once("javascript/design-functions.js");?>
    </script>
    <script>
        <?php require_once("javascript/message.js");?>
    </script>
  </body>

</html>
