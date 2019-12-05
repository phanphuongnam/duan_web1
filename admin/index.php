<?php 
  session_start();
	require_once '../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
	



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once 'layouts/head_tag.php'; ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- main header -->
  		<?php include_once 'layouts/header.php'; ?>
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
            
            <li><a href="#"><i class="fa fa-info" aria-hidden="true"></i>Thông tin website</a></li>
            <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Slide</a></li>
            <li><a href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i> Đối Tác</a></li>

            <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i>Phản Hồi</a></li>
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
        	<a href="<?php echo Base_url ?>admin/hoadonchitiet">
        		<i class="fa fa-book"></i><span>Đơn Hàng Chi Tiết</span>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
  
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
  </div>
  <!-- /.content-wrapper -->
 <!-- footer -->
 	<?php include_once 'layouts/footer.php' ?>
 <!-- footer -->
</body>
</html>
