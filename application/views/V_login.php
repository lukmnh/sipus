<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Sistem Informasi Perpustakaan</b><br>SD Islam Nurul Hikmah</a>
  </div>
  <div class="login-box-body">
    <h2 class="login-box-msg" style="font-weight: bold">Login</h2>
    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="NISN">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SD Islam Nurul Hikmah | Perpustakaan</title>
  <link href="<?= base_url() ?>assets/img/logo.jpg" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <style>
    .login-page {
      background-color: #91abfb;
    }

    .card {
      border-radius: 25px;
      padding: 20px;
      background-image: linear-gradient(to right top, #a8c1f5, #91abfb, #8393fd, #7f78fa, #8657f2);
    }

    .login {
      font-size: 24px;
      font-weight: bold;
      color: black;
    }

    .login-card-body {
      background-image: linear-gradient(to right top, #c2a8f5, #ab87f4, #9266f2, #7743ef, #5412eb);
    }

    .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo1 {
      color: black;
      font-size: 36px;
      font-weight: bolder;
    }
  </style>
</head>

<!-- <img src="assets/img/logo.jpg" alt="" width="160" height="100"><br> -->

<body class="login-page">
  <div class="card">
    <div class="login-box">
      <div class="login-logo">
        <b class="logo1">Perpustakaan SD Islam Nurul Hikmah</b>
      </div>
      <?= $this->session->flashdata('info'); ?>
      <div class="card-body login-card-body">
        <p class="login-box-msg login">LOG IN</p>
        <form action="<?= base_url() ?>login/auth" method="post">
          <div class="input-group mb-3">
            <input type="text" name="nomor_induk" class="form-control" placeholder="Nomor Induk" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span style="color:black" class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span style="color:black" class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>