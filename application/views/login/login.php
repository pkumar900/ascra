
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Sign In |</title>
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="<?= base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="<?= base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
  <div class="login-box">
    <div class="logo">
      <a href="javascript:void(0);">Admin <b>Panel</b></a>
      <small>Panel</small>
    </div>
    <div class="card">
      <div class="body">
        <?= form_open('Login/checklogin',array('class' => 'form','id'=>'login')); ?>

        <div class="msg">Sign in to start your session<br><br>
          <?= isset($msg)?'<div class="alert alert-danger">Inavalid Credentials</div>':''; ?>
        </div>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="material-icons">person</i>
          </span>
          <div class="form-line">
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
          </div>
          <?= form_error('username'); ?>
        </div>
        <div class="input-group">
          <span class="input-group-addon">
            <i class="material-icons">lock</i>
          </span>
          <div class="form-line">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <?= form_error('password'); ?>
        </div>
        <div class="row">
          <div class="col-xs-8 p-t-5">
            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label>
          </div>
          <div class="col-xs-4">
            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
          </div>
        </div>
        <div class="row m-t-15 m-b--20">
          <div class="col-xs-6">
            <a href="sign-up.html">Register Now!</a>
          </div>
          <div class="col-xs-6 align-right">
            <a href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Jquery Core Js -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>assets/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>assets/js/admin.js"></script>
<script src="<?= base_url() ?>assets/js/pages/examples/sign-in.js"></script>
</body>

</html>

<script type="text/javascript">

  $("#login").validate({
    rules: {
      username: {
        required: true,
        email:true
          // step: 10
        },
        password: {
          required: true,
        }
      },
      errorPlacement: function (error, element) {
        if (element.prop("type") == "text") {
          error.insertAfter($(element).parent('div'));
        } 
        else if (element.prop("type") == "password") {
          error.insertAfter($(element).parent('div'));
        } else  if (element.prop("type") == "email") {
          error.insertAfter($(element).parent('div'));
        } 
      }
    });
  </script>