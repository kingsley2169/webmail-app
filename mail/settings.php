<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: ../recognition/login.php");
  }
?>

<?php include_once 'header_mail.php'; ?>
  <body>

    <?php
      include_once "php/phpconfiguration.php";
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if (mysqli_num_rows($sql)>0) {
        $row = mysqli_fetch_assoc($sql);
      }
     ?>
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

      <div class="container" style="font-family: 'Times New Roman', serif;">
        <br>
        <div class="updatePassword">
          <form class="changePasswordForm" action="" method="post">
            <h2>Change Password</h2>
            <div class="row">
              <div class="col" style="padding: 20px 0;">
                <div class="form-floating outerB" id="show_hide_oldpassword">
                  <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
                  <a href="" class="icon-inside"><i class="fa fa-eye-slash"></i></a>
                  <label for="oldpassword">Old Password</label>
                </div>
              </div>
              <br>
              <div class="col" style="padding: 20px 0;">
                <div class="form-floating outerB" id="show_hide_newpassword">
                  <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                  <a href="" class="icon-inside"><i class="fa fa-eye-slash"></i></a>
                  <label for="newpassword">New Password</label>
                </div>
              </div>
            </div>
            <div class="text-center btnP" style="float: right;">
              <button class="btn btn-primary" type="submit">Change Password</button>
            </div>
          </form>
        </div>

        <br>
        <br>
        <br>
        <br>

        <div class="updateDepartment">
          <form class="changeDepartmentForm" action="" method="post">
            <h2>Change Department</h2>
            <div class="row">
              <div class="col" style="padding: 20px 0;">
                <div class="outerB">
                  <input type="text" class="form-control" value="<?php echo $row['dept']?>" name="olddepartment" id="olddepartment" disabled style="padding: 1rem 0.75rem;">
                </div>
              </div>
              <br>
              <div class="col" style="padding: 20px 0;">
                <div class="form-floating outerB">
                  <select class="form-select" id="newdept" name="newdept">
                    <option>Marketing</option>
                    <option>Delivery</option>
                    <option>Tech</option>
                    <option>Business Intelligence</option>
                    <option>Finance</option>
                  </select>
                  <label for="sel1" class="form-label">Department</label>
                </div>
              </div>
            </div>
            <div class="text-center btnD" style="float: right;">
              <button class="btn btn-primary" type="submit">Change Department</button>
            </div>
          </form>
        </div>


      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        <?php require_once("javascript/design-functions.js");?>
    </script>
    <script type="text/javascript" src="javascript/settings.js"></script>
  </body>
</html>
