<!DOCTYPE html>
<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }
?>
<?php
  include_once "php/phpconfiguration.php";
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if (mysqli_num_rows($sql)>0) {
    $row = mysqli_fetch_assoc($sql);
  }
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles/inbox_mail.css" rel="stylesheet">
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
        <div class="mx-auto order-0">
          <form action="">
            <input type="text" placeholder="Search..." name="search" class="searchbox" style="width: 600px; height: 40px; border-radius: 10px; padding: 2px 5px 2px 5px;">
          </form>
        </div>

        <div class="navbar-collapse collapse order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto" style="margin-right: 25px;">
                <li class="nav-item">
                  <button  onclick="location.href='settings.php'"type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4"><i class="fa fa-gear mr-2"></i></button>
                </li>
            </ul>
        </div>
    </nav>



    <!-- Page content holder -->
    <div class="page-content p-5" id="content">

      <!-- Vertical navbar -->
      <div class="vertical-nav bg-white" id="sidebar">
        <br>
        <button type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4" style="margin: 0 auto; display: block;">Compose</button>
        <br>
        <ul class="nav flex-column bg-white mb-0">
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic bg-light">
                      <i class="fa fa-inbox mr-3 text-primary fa-fw"></i>
                      Inbox
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-paper-plane mr-3 text-primary fa-fw"></i>
                      Sent
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-tag mr-3 text-primary fa-fw"></i>
                      Important
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-trash mr-3 text-primary fa-fw"></i>
                      Trash
                  </a>
          </li>
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

        <ul class="nav flex-column bg-white mb-0">
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                      Area charts
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                      Bar charts
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                      Pie charts
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark font-italic">
                      <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                      Line charts
                  </a>
          </li>
        </ul>
      </div>
      <!-- End vertical navbar -->
      <div class="">

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        <?php require_once("javascript/design-functions.js");?>
    </script>
    <script>
      <?php require_once("https://use.fontawesome.com/a31a3f8384.js") ?>
    </script>
    <script src="https://use.fontawesome.com/a31a3f8384.js"></script>
  </body>

</html>
