<?php
        require_once 'commons/db.php';
        session_start(); 
        if (isset($_SESSION['login'])) {
          header('location:'.Base_url);
        }
        $errName=$errEmail=$errPassword=$errPassword_cf=$sucsess="";

       if (isset($_POST['btn_s'])) {
         $test='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-.]+(\.[a-z0-9-]+)$/';
         $email=$_POST['email'];
         $name=$_POST['name'];
         $password=$_POST['password'];
         $password_cf=$_POST['password_cf'];
         $sql = "SELECT * FROM users where email='$email'";
         $user=executeQuery($sql,false);   
         if ($email=="") {
          $errEmail="Bạn chưa điền email";
         
          
         }
         if($name==""){
            $errName="Bạn chưa nhập họ tên ";
         
            
         }
         if ($password=="") {
             $errPassword="Bạn chưa nhập password";
          
           
         }
         if ($password_cf=="") {
             $errPassword_cf="Bạn chưa nhập xác nhận lại password";
           
           
         }
          elseif (!preg_match($test,$email)) {
          $errEmail="Email không hợp lệ, vui lòng nhập lại";
          
          
         }
         
         elseif ($user!=false) {
          $errEmail="Email đã được đăng kí";
  
          
         }
         
        
 
         
         elseif ($password!=$password_cf) {
             $errPassword_cf="Mật khẩu không khớp nhau";
            
           
        }
        else{
             $password_h = password_hash($password,PASSWORD_DEFAULT);
             
             $sql = "insert into users(email,name,password,avatar)
                     values('$email','$name','$password_h','public/images/user.png')

                     ";
              executeQuery($sql);
               
               $sucsess ="Đăng Ký Thành Công";
         }
         
   
                              
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo Base_url; ?>"><b>Trang</b>Chủ</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <span style="color: green;"><?php echo $sucsess; ?></span>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <span style="color: red;"><?php echo $errName; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span style="color: red;"><?php echo $errEmail; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span style="color: red;"><?php echo $errPassword; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_cf" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <span style="color: red;"><?php echo $errPassword_cf; ?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="btn_s" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="<?php echo Base_url ?>login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
