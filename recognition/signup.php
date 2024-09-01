

<?php include_once "header_recognition.php"; ?>
  <body>

    <div class="container">

      <div class="login-image d-none d-lg-block d-md-none d-xs-none d-sm-none">
        <img src="images/log.png" alt="" class="loginImage">
      </div>

      <div class="signup-details d-flex align-items-center">
        <form class="form-floating" action="" method="post">
          <div class="form-floating outerB">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First" aria-label="First name" required>
            <label for="firstname">First Name</label>
          </div>

          <br>

          <div class="form-floating outerB">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last" aria-label="Last name" required>
            <label for="lastname">Last Name</label>
          </div>

          <br>

          <div class="form-floating outerB">
            <input type="text" class="form-control" id="idNo" name="identityNumber" placeholder="Identity Number" aria-label="Identity Document Number" required>
            <label for="idNo">Identity Document Number</label>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>

          <br>
          <br>

          <div class="form-floating outerB">
            <select class="form-select" id="dept" name="dept">
              <option>Marketing</option>
              <option>Delivery</option>
              <option>Tech</option>
              <option>Business Intelligence</option>
              <option>Finance</option>
            </select>
            <label for="sel1" class="form-label">Department</label>
          </div>

          <br>

          <div class="form-floating outerB" id="show_hide_password">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <a href="" class="icon-inside"><i class="fa fa-eye-slash"></i></a>
            <label for="password">Password</label>
          </div>

          <br>

          <div class="form-floating outerB" id="show_hide_conpassword">
            <input type="password" class="form-control" id="confirmpassword" placeholder="Password">
            <a href="" class="icon-inside"><i class="fa fa-eye-slash"></i></a>
            <label for="confirmpassword">Confirm Password</label>
            <div id="passwordError" class="form-text">The two passwords do not match.</div>
          </div>
          <br>

          <div class="text-center btn">
            <button class="btn btn-primary" type="submit">Sign Up</button>
          </div>

        </form>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="design.js"></script>
    <script language="JavaScript" type="text/javascript" src="signup.js"></script>

  </body>

</html>
