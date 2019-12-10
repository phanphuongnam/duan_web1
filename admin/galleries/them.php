<?php 
  session_start();
	require_once '../../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $id=$_GET['id'];
	
  if(isset($_POST['submit'])){
    $url='C:/xampp/htdocs/duan_web1/public/images/';
    $filename = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
      if(empty($filename)){
        $errFilename= "Bạn chưa nhập ảnh ";
      }
      else{
        
        if($file_size > 2000000){
          $errSize= "File của bạn quá lớn file của bạn phải nhỏ hơn < 2MB";
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
          $errType= "File phải có định dạng jpg , png , jpeg";
        }
        
        else{
          $insert_product_image = "INSERT INTO product_gallreries(product_id,image_url)
             VALUES ('$id','public/images/$filename')";
          executeQuery($insert_product_image);
          var_dump($insert_product_image);
          move_uploaded_file($tmp_name,$url.$filename);
          header("location:".Base_url."admin/galleries/?product-album=".$id);
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

            <li><a href="<?php echo Base_url.'admin/phanhoi'; ?>"><i class="fa fa-reply" aria-hidden="true"></i>Phản Hồi</a></li>
          </ul>
        </li>

        <li class="active">
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
        Thêm ảnh
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản Phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <form style="margin-bottom: 20px;font-family: time new roman"  action="" method="post" enctype="multipart/form-data" class="container-fluid">
          <div class="rows col-lg-6 form-group">
            <span>
              <?php if(isset($errType)): ?>   
               <button type='button' class='btn btn-danger btn-sm'>
                  <i style='font-size: 15px;' class='fa fa-exclamation-triangle' aria-hidden='true'>
                   <?php echo $errType; ?>
                  </i>
              </button>
              <?php elseif(isset($err)): ?>   
               <button type='button' class='btn btn-danger btn-sm'>
                  <i style='font-size: 15px;' class='fa fa-exclamation-triangle' aria-hidden='true'>
                   <?php echo $err; ?>
                  </i>
              </button>
              <?php endif ?>
            </span>
            <br>
            <label style="cursor: pointer;" class="text-center" for="fileUPLOAD">
              <i style="font-size: 23px;" class="fa fa-cloud-upload" aria-hidden="true">
              </i>
              <span id="show_msg" style="font-size: 15px">Tải Lên Ảnh</span>         
            </label>
            <br>
            <span class="text-danger"><?php if(isset($errFilename)) echo $errFilename; ?></span>
            <br>
            <input type="submit" class="ppn col-2 container-fluid btn btn-success btn-sm" value="Thêm" name="submit">
            <a href="<?php echo Base_url."admin/galleries/?product-album=".$id ?>" class="col-2 container-fluid btn btn btn-danger  btn-sm">Hủy</a>
            <br>
            <script>
                $(document).ready(function(){
                    $('#fileUPLOAD').change(function(e){
                        var fileName = e.target.files[0].name;
                        $('#show_msg').html(fileName)
                    });
                });
            </script>
            <br>
            <br> 
            <input style="display: none;" type="file" name="fileToUpload" id="fileUPLOAD">
            </div>
        </form>

    </section>
       
  </div>

  <!-- /.content-wrapper -->
 <!-- footer -->
 	<?php include_once '../layouts/footer.php' ?>
 <!-- footer -->
</body>
</html>
