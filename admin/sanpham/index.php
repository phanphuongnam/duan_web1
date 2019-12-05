<?php 
  session_start();
	require_once '../../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $sql = "select
          *,
          categories.cate_name as cate_name,amount*price as total_price
          from products
          join categories
            on products.cate_id = categories.id
          order by products.id asc";
  $products =executeQuery($sql,true);
	



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
        Danh Sách Sản Phẩm
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản Phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <table class="table text-center">
        <thead>
          <tr>
              <th scope="col">Tên Sản Phẩm</th>    
              <th scope="col">Ảnh</th>
              <th scope="col">Danh Mục</th>
              <th scope="col">Số Lượng</th>
              <th scope="col">Giá</th>
              <th scope="col">
                <a href="themsp.php">
                  <button style="width:100%;max-width:100px;" class="btn btn-success btn-sm" type="submit"><i style="font-size: 14px;" class="fa fa-plus-circle " aria-hidden="true"></i>
                    Thêm</button>
                </a>
              </th>
          </tr>
   
      </thead>
      <?php foreach($products as $p) : ?>
        <tbody>
          <tr>
            <td><?php echo $p['name'] ?></td>
            <td class="col-lg-2"><img style="height: 100%;max-height: 80px;"
               src="<?php echo Base_url.$p['image'] ?>">
               <br>

               <a href="#">Album Ảnh</a>
            </td>

            <td>
              <?php if($p['cate_name']=='' || $p['cate_name']==null): ?>
                Không có danh mục
              <?php else: ?>
              <?php echo $p['cate_name'] ?>
               <?php endif ?> 
            </td>
            <td><?php echo $p['amount'] ?></td>
            <td><?php echo $p['price'] ?> VND</td>
            <td class="col-lg-2">
              <a href="suasp.php?id=<?php echo $p['id'] ?>">
                  <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                   Sửa</button> 
                </a>
                <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $p['name'] ?> không?')" 
                  href="xoasp.php?id=<?php echo $p['id'] ?>" class="nam123">
                  <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> Xóa </button>
                </a>
              
          </td>
          </tr>
        </tbody>

        <?php endforeach ?>
  
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        </table>

        

    </section>
       
  </div>

  <!-- /.content-wrapper -->
 <!-- footer -->
 	<?php include_once '../layouts/footer.php' ?>
 <!-- footer -->
</body>
</html>
