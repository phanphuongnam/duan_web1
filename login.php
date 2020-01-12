<?php
        require_once 'commons/db.php';
        session_start();
        if (isset($_SESSION['login'])) {
          header('location:'.Base_url);
        }
        $errEmail=$errPassword="";
       // validate login
       if (isset($_POST['btn_s'])) {
         $email=$_POST['email'];
         $password=$_POST['password'];
         $sql = "select *,DATE_FORMAT(created_at,'%d/%m/%Y') AS n from users where email='$email'";
         $user=executeQuery($sql,false);
         if ($email=="") {
          $errEmail="Bạn chưa nhập email";
          
         }
         if ($password=="") {
             $errPassword="Bạn chưa nhập password";
          
         }
         elseif ($user['email']==null || $user['email']=='') {
           $errEmail="Email sai";
         }
         // elseif ($user['trangthai']==2) {
         //     $err0="Đăng Nhập Thất Bại, Tài Khoản Của Bạn Chưa Được Kích Hoạt";
          
        else{
          if (password_verify($password,$user['password'])) {
         
            $_SESSION['login']=$user;
            // setcookie('name', $user['name'], time() + (86400 * 30), "/");
            // setcookie('email', $user['email'], time() + (86400 * 30), "/");
            // setcookie('id', $user['id'], time() + (86400 * 30), "/");
            header('location:'.Base_url);
            
         }
          else{
            $errPassword="Bạn nhập sai password ";
         }
         
       }
         
   
                              
      }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo Base_url ?>admin/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo Base_url ?>admin/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo Base_url ?>admin/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Base_url ?>admin/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo Base_url ?>admin/AdminLTE/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo Base_url ?>"><b>Trang</b>Chủ</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
        

        
    <form action="" method="post">
      <div class="form-group has-feedback">
        
        <input type="text" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback">
          
            
        </span>
        <span style="color: red;"><?php echo $errEmail; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback">
          
        </span>
        <span style="color: red;"><?php echo $errPassword; ?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="btn_s" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="<?php echo Base_url ?>register.php" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo Base_url ?>admin/AdminLTE/plugins/iCheck/icheck.min.js"></script>
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
</html>