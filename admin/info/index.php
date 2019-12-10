<?php 
  session_start();
	require_once '../../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $sql = "select
          *
          from settings_web";
  $settings_web =executeQuery($sql,false);
  if(isset($_POST['submit'])){
    $url='C:/xampp/htdocs/duan_web1/public/images/';
    $filename_logo = $_FILES['fileToUpload']['name'];
    $tmp_name_logo = $_FILES['fileToUpload']['tmp_name'];
    $file_size_logo = $_FILES['fileToUpload']['size'];;
    $slogan =$_POST['slogan'];
    $hotline =$_POST['hotline'];
    $email =$_POST['email'];
    $company_name=$_POST['company_name'];
    $address = $_POST['address'];
    $link_fb = $_POST['facebook'];
    $link_ytb = $_POST['youtube'];
    $link_tw = $_POST['twitter'];
    $link_inst = $_POST['instagram'];
    $map = $_POST['map'];
    $content = $_POST['content'];
    $imageFileType = pathinfo($filename_logo,PATHINFO_EXTENSION);
    if(empty($slogan) || empty($hotline) || empty($email) || empty($company_name)
      || empty($address) || empty($link_fb) || empty($link_ytb)|| empty($link_tw) || empty($link_inst)
      || empty($map) || empty($content))
    {
      if (empty($slogan)) {
        $errSlogan= "Bạn chưa nhập khẩu hiệu của website";
       
      }
      if (empty($hotline)) {
        $errHotline="Bạn chưa nhập hotline ";
      }
      if (empty($email)) {
        $errEmail= "Bạn chưa nhập email ";
      }
      if(empty($company_name)){
        $errCompany= "Bạn chưa nhập tên công ty";
      }
      if(empty($address)){
        $errAddr= "Bạn chưa nhập địa chỉ";
      }
      if(empty($map)){
        $errMap= "Bạn chưa nhập bản đồ vị trí của công ty";
      }
      if(empty($content)){
        $errCt= "Bạn chưa nhập nội dung giới thiệu về website";
      }
      if(empty($link_ytb)){
        $errYTB= "Bạn chưa nhập link youtube";
      }
      if(empty($link_tw)){
        $errTW= "Bạn chưa nhập link twitter";
      }
      if(empty($link_inst)){
        $errINST= "Bạn chưa nhập link instagram";
      }
      if(empty($link_fb)){
        $errFB= "Bạn chưa nhập link facebook";
      }
      
    }
    elseif($filename_logo=='' && $filename_icon==''){
        $update_info = "UPDATE settings_web SET slogan='$slogan', hotline = '$hotline', email = '$email', company_name = '$company_name',address='$address',map='$map',content_about='$content',
          url_facebook='$link_fb',url_youtube='$link_ytb',url_twitter='$link_tw',url_instagram='$link_inst'";
        executeQuery($update_info);
        header("location:".Base_url."admin/info?success=Cập Nhật Thành Công");
    }

    else{
        
        if($file_size_logo > 2000000 || $filename_icon > 2000000){
          $errSize= "File của bạn quá lớn file của bạn phải nhỏ hơn < 2MB";
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
          $errType= "File phải có định dạng jpg , png , jpeg";
        }
        
        else{
          $update_info = "UPDATE settings_web SET slogan='$slogan', hotline = '$hotline', email = '$email', company_name = '$company_name',address='$address',map='$map',content_about='$content',
          url_facebook='$link_fb',url_youtube='$link_ytb',url_twitter='$link_tw',url_instagram='$link_inst',
          logo='public/images/$filename_logo'";
          executeQuery($update_info);
          move_uploaded_file($tmp_name_logo,$url.$filename_logo);
          
          header("location:".Base_url."admin/info/?success=Cập Nhật Thành Công");
         
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
            
            <li class="active"><a href="<?php echo Base_url.'admin/info'; ?>"><i class="fa fa-info" aria-hidden="true"></i>Thông tin website</a></li>
            <li><a href="<?php echo Base_url.'admin/slider'; ?>"><i class="fa fa-sliders" aria-hidden="true"></i>Slide</a></li>
            <li><a href="<?php echo Base_url.'admin/doitac'; ?>"><i class="fa fa-bandcamp" aria-hidden="true"></i> Đối Tác</a></li>

            <li><a href="<?php echo Base_url.'admin/phanhoi'; ?>"><i class="fa fa-reply" aria-hidden="true"></i>Phản Hồi</a></li>
          </ul>
        </li>

        <li class="">
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
        Thông tin website
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thông tin website</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <form style="margin-bottom: 20px;font-family: time new roman"  action="" method="post" enctype="multipart/form-data" class="container-fluid form-group">
          <div class="rows col-lg-6">
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
              <?php elseif(isset($_GET['success'])): ?>   
                  <i style='font-size: 17px;' class='fa fa-check text-success' aria-hidden='true'>
                   <?php echo $_GET['success']; ?>
                  </i>
              </button>
              <?php endif ?>
            </span>
            <br>
            <label>Logo</label>
            <br>
            <div class="col-lg-12">
              <img style="height: 200px;" class="img-thumbnail col-lg-5 form-group" alt="Responsive image" src="<?php echo Base_url.$settings_web['logo'] ?>">  
            </div>
            <label style="cursor: pointer;" class="text-center" for="fileUPLOAD">
                <i style="font-size: 23px;" class="fa fa-cloud-upload" aria-hidden="true">
                </i>
                <span id="show_msg" style="font-size: 15px">Tải Lên Logo</span>
            </label>
            <br>
            <label>Slogan</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="slogan" id="exampleFormControlFile1"
              value="<?php echo $settings_web['slogan'] ?>">
            <span class="text-danger"><?php if(isset($errSlogan)) echo $errSlogan; ?></span>
            <br>
            <label>Hotline</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="hotline" id="exampleFormControlFile1"
              value="<?php echo $settings_web['hotline'] ?>">
            <span class="text-danger"><?php if(isset($errHotline)) echo $errHotline; ?></span>
            <br>
            <label>Email</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="email" id="exampleFormControlFile1"
              value="<?php echo $settings_web['email'] ?>">
            <span class="text-danger"><?php if(isset($errEmail)) echo $errEmail; ?></span>
            <br>
            <label>Company Name</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="company_name" id="exampleFormControlFile1"
              value="<?php echo $settings_web['company_name'] ?>">
            <span class="text-danger"><?php if(isset($errCompany)) echo $errCompany; ?></span>
            <br>
            <label>Address</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="address" id="exampleFormControlFile1"
              value="<?php echo $settings_web['address'] ?>">
            <span class="text-danger"><?php if(isset($errAddr)) echo $errAddr; ?></span>
            <br>
            
            <input style="display: none;" type="file" name="fileToUpload" id="fileUPLOAD">
            <input style="display: none;" type="file" name="fileToUpload2" id="fileUPLOAD2">
            
          </div>
          <div class="rows col-lg-6">
             <br>
             <label>Link Facebook</label>
              <input class="col-3 form-control container-fluid form-control-default" type="text" 
               name="facebook" id="exampleFormControlFile1"
                value="<?php echo $settings_web['url_facebook'] ?>">
              <span class="text-danger"><?php if(isset($errFB)) echo $errFB; ?></span>
              <br>
              <label>Link Youtube</label>
              <input class="col-3 form-control container-fluid form-control-default" type="text" 
               name="youtube" id="exampleFormControlFile1"
                value="<?php echo $settings_web['url_youtube'] ?>">
              <span class="text-danger"><?php if(isset($errYTB)) echo $errYTB; ?></span>
              <br>
              <label>Link Twitter</label>
              <input class="col-3 form-control container-fluid form-control-default" type="text" 
               name="twitter" id="exampleFormControlFile1"
                value="<?php echo $settings_web['url_twitter'] ?>">
              <span class="text-danger"><?php if(isset($errTW)) echo $errTW; ?></span>
              <br>
              <label>Link Instagram</label>
              <input class="col-3 form-control container-fluid form-control-default" type="text" 
               name="instagram" id="exampleFormControlFile1"
                value="<?php echo $settings_web['url_instagram'] ?>">
              <span class="text-danger"><?php if(isset($errINST)) echo $errINST; ?></span>
              <br>
              <label>Link Google Map</label>
              <input class="col-3 form-control container-fluid form-control-default" type="text" 
               name="map" id="exampleFormControlFile1"
                value='<?php echo $settings_web['map'] ?>'>
              <span class="text-danger"><?php if(isset($errMap)) echo $errMap; ?></span>
              <br>
              <label>Nội dung giới thiệu</label>
                <textarea id="editor1" name="content" rows="10" cols="1000"> 
                    <?php echo $settings_web['content_about'] ?>
                </textarea>
              <span class="text-danger"><?php if(isset($errCt)) echo $errCt; ?></span>
              <br>
              <input type="submit" class="ppn col-2 container-fluid btn btn-success btn-sm" value="Cập Nhật" name="submit">
              <a href="<?php echo Base_url."admin" ?>" class="col-2 container-fluid btn btn btn-danger  btn-sm">
                Hủy
              </a>
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
