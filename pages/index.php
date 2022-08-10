<?php 
session_start();
if(!isset($_SESSION['loginId'])){
  if (isset($_COOKIE['loginId']) && isset($_COOKIE['role'])) {
    $_SESSION['loginId'] = $_COOKIE['loginId'];
    $_SESSION['role'] = $_COOKIE['role'];
    $_SESSION['fullname'] = $_COOKIE['fullname'];
    header("Location:main");
  }
}else{
  header("Location:main");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>คลังเวชภัณฑ์ทันตกรรม KNH</title>

  <?php
  require_once("link.php");
  ?>
<!-- jQuery -->
<script src="../plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- tata -->
<script src="../plugins/tata/tata.js"></script>
<style>
  body { 
  background: url(../dist/img/bg2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Dental Supplies</b> KNH</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="post" enctype="multipart/form-data" id="loginFrom">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

          </div>
        </form>

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
      </div>

    </div>
  </div>
  <script src="ajax/index.js"></script>
</body>

</html>