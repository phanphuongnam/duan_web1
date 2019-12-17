<?php 
  session_start();
	require_once '../../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $id=$_GET['id'];
  $sql = "select
          *,DATE_FORMAT(orders.created_at,'%d/%m/%Y') AS day_buy
          from orders where id =$id";
  $order_detail =executeQuery($sql,false);
  if(isset($_POST['submit'])){
    $status_payment =$_POST['status_payment'];
    $update_order = "UPDATE orders SET status='$status_payment' WHERE id = $id";
    executeQuery($update_order);
    header("location:".Base_url."admin/hoadon");

         
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
        Cập nhật đơn hàng
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Đơn Hàng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <form style="margin-bottom: 20px;font-family: time new roman"  action="" method="post" enctype="multipart/form-data" class="container-fluid form-group">
          <div class="rows col-lg-6">
            <label>Tên Khách Hàng</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" name="name" id="exampleFormControlFile1" 
            value="<?php echo $order_detail['customer_name'] ?>">
            <span class="text-danger"><?php if(isset($errName)) echo $errName; ?></span>
            <br>
            <label>Số Điện Thoại</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" 
             name="amount" id="exampleFormControlFile1"
              value="<?php echo $order_detail['customer_phone'] ?>">
            <span class="text-danger"><?php if(isset($errAmount)) echo $errAmount; ?></span>
            <br>
            <label>Email</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" class="form-control-file" name="price" id="exampleFormControlFile1"
            value="<?php echo $order_detail['customer_email'] ?>">
           
            <br>
            <label>Địa Chỉ</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" class="form-control-file" name="price" id="exampleFormControlFile1"
            value="<?php echo $order_detail['customer_address'] ?>">
           
            <br>
            <label>Tổng Tiền</label>
            <input readonly class="form-control container-fluid form-control-default" type="text" class="form-control-file" name="price" id="exampleFormControlFile1"
            value="<?php echo $order_detail['total_price'] ?> VNĐ">
           
            <br>
            <label>Phương Thức Thanh Toán</label>
            <input readonly class="container-fluid form-control form-control-default" type="text" 
            value="<?php foreach($payment_method as $key => $value) : ?><?php if($order_detail['payment_method']==$value): ?><?php echo $key; ?><?php endif; ?><?php endforeach; ?>">
            <br>
            <label>Ngày Mua</label>
            <input readonly class="col-3 form-control container-fluid form-control-default" type="text" class="form-control-file" name="price" id="exampleFormControlFile1"
            value="<?php echo $order_detail['day_buy'] ?>">
           
            <br>
            <label>Trang Thái Thanh Toán</label>
            <select class="col-3 container-fluid form-control form-control-default" name="status_payment">
              <?php foreach ($status_order as $key => $value): ?> 
              <option 
                <?php if ($order_detail['status'] == $value): ?>selected <?php endif; ?> value="<?php echo $value; ?>"><?php echo $key; ?>
              </option>
              <?php endforeach; ?>
            </select>
            <br>
            
            <input type="submit" class="ppn col-2 container-fluid btn btn-success btn-sm" value="Cập nhật" name="submit">
            <a href="<?php echo Base_url."admin/hoadon" ?>" class="col-2 container-fluid btn btn btn-danger  btn-sm">Hủy</a>
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
