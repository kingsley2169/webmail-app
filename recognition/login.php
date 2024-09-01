
<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {

  }
?>

<?php include_once "header_recognition.php"; ?>
  <body>

    <div class="container">

      <div class="login-image d-none d-lg-block d-md-none d-xs-none d-sm-none">
        <img src="images/log.png" alt="" class="loginImage">
      </div>

      <div class="signup-details d-flex align-items-center">
 
        <form class="form-floating" action="" method="post">

          <div class="form-floating outerB">
            <input type="text" class="form-control" name="identityNumber" id="identityNumber" placeholder="name@example.com">
            <span class="icon-inside"><i class="fa fa-envelope"></i></span>
            <label for="identityNumber">Email address</label>
          </div>

          <br>

          <div class="form-floating outerB" id="show_hide_password">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <a href="" class="icon-inside"><i class="fa fa-eye-slash"></i></a>
            <label for="password">Password</label>
          </div>

          <br>

          <div class="text-center btn">
            <button class="btn btn-primary" type="submit">Sign In</button>
          </div>

        </form>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="design.js"></script>
    <script language="JavaScript" type="text/javascript" src="login.js"></script>

  </body>

</html>
