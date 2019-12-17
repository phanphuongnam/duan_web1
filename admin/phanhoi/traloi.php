<?php 
  session_start();

  require_once '../../commons/db.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../../libarys/PHPMailer/src/Exception.php';
  require '../../libarys/PHPMailer/src/PHPMailer.php';
  require '../../libarys/PHPMailer/src/SMTP.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $id=$_GET['id'];
  $sql="select * from contacts where id = $id";
  $detail_contact=executeQuery($sql,false);
  if(isset($_POST['submit'])){
    $content =$_POST['mota'];
    $status = $_POST['status'];
      if (empty($content)) {
        $errDesc= "Bạn chưa nhập nội dung";
       
      }
      else{
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'namhhtml001@gmail.com';                     // SMTP username
            $mail->Password   = 'badboy1997';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom("namhhtml001@gmail.com","Phụ Kiện Máy Tính");
            $mail->addAddress($detail_contact['email']);               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information'); 
            // Content
            $mail->CharSet = "UTF-8";
            $mail->isHTML(true);                            // Set email format to HTML
            $mail->Subject ='Chào Bạn';
            $mail->Body =$content;
            $mail->send();
            $thanhcong= "Phản hồi thành công";
            $sql="update contacts set status='$status' where id=$id";
            executeQuery($sql);
          }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
      
    
    
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once '../layouts/head_tag.php'; ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- main header -->
      <?php include_once '../layouts/header.php'; ?>
  <!-- //main header -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo Base_url.$_SESSION['login']['avatar']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login']['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs" aria-hidden="true"></i><span>Cấu Hình Hệ Thống</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo Base_url.'admin'; ?>"><i class="fa fa-bar-chart" aria-hidden="true"></i></i> Thống kê</a></li>
            
            <li><a href="<?php echo Base_url.'admin/info'; ?>"><i class="fa fa-info" aria-hidden="true"></i>Thông tin website</a></li>
            <li><a href="<?php echo Base_url.'admin/slider'; ?>"><i class="fa fa-sliders" aria-hidden="true"></i>Slide</a></li>
            <li><a href="<?php echo Base_url.'admin/doitac'; ?>"><i class="fa fa-bandcamp" aria-hidden="true"></i> Đối Tác</a></li>

            <li class="active"><a href="<?php echo Base_url.'admin/phanhoi'; ?>"><i class="fa fa-reply" aria-hidden="true"></i>Phản Hồi</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo Base_url ?>admin/sanpham">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <span>Sản Phẩm</span>
          </a>
        </li>
        <li>
          <a href="<?php echo Base_url ?>admin/danhmuc">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            <span>Danh Mục</span>
          </a>
        </li>
        <li>
          <a href="<?php echo Base_url ?>admin/hoadon">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span>Đơn Hàng</span>
          </a>
        </li>

        <li>
          <a href="<?php echo Base_url ?>admin/binhluan">
            <i class="fa fa-comment-o" aria-hidden="true"></i>
            <span>Bình Luận</span>
          </a>
        </li>
        <li>
          <a href="<?php echo Base_url ?>admin/vouchers">
            <i class="fa fa-archive" aria-hidden="true"></i>
            <span>Mã Giảm Giá</span>
          </a>
        </li>
         <li>
          <a href="<?php echo Base_url ?>admin/users">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Users</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trả Lời
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Phản Hồi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <span class="text-primary"><?php if(isset($thanhcong)) echo $thanhcong; ?></span>
      <form style="margin-bottom: 20px;font-family: time new roman"  action="" method="post" enctype="multipart/form-data" class="container-fluid">
          <div class="rows col-lg-6 form-group">
            <input type="hidden" name="status" value="1">
            <br>
            <label>Email</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" name="link" readonly id="exampleFormControlFile1" value="<?php echo $detail_contact['email'] ?>">
            <span class="text-danger"><?php if(isset($errLink)) echo $errLink; ?></span>
            <br>
            <label>Họ Tên</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" name="link" id="exampleFormControlFile1" value="<?php echo $detail_contact['fullname'] ?>">
            <span class="text-danger"><?php if(isset($errLink)) echo $errLink; ?></span>
            <br>
            <label>Nội dung</label>
            <textarea id="editor1" name="mota" rows="10" cols="1000">
            </textarea>
            <span class="text-danger"><?php if(isset($errDesc)) echo $errDesc; ?></span>
            <br>
            <input type="submit" class="ppn col-2 container-fluid btn btn-success btn-sm" value="Gửi" name="submit">
            <a href="<?php echo Base_url."admin/phanhoi" ?>" class="col-2 container-fluid btn btn btn-danger  btn-sm">Hủy</a>
            <br> 
        </form>

    </section>
       
  </div>

  <!-- /.content-wrapper -->
 <!-- footer -->
  <?php include_once '../layouts/footer.php' ?>
 <!-- footer -->
</body>
</html>
