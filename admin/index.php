<?php 
  session_start();
	require_once '../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $sql= "select count(*) as totalPros from products";
  $totalPros=executeQuery($sql);
  $sql= "select count(*) as totalCates from categories";
  $totalCates=executeQuery($sql);
  $sql= "select count(*) as totalcmts from comments";
  $totalcmts=executeQuery($sql);
  $sql= "select count(*) as totalbrs from brands";
  $totalbrs=executeQuery($sql);
  $sql= "select count(*) as totalContacts from contacts";
  $totalContacts=executeQuery($sql);
  $sql= "select count(*) as totalOrders from orders";
  $totalOrders=executeQuery($sql);
  $sql= "select count(*) as totalUsers from users";
  $totalUsers=executeQuery($sql);
  $sql = "SELECT *,(SELECT COUNT(*) FROM products WHERE products.cate_id=categories.id) as total_product FROM categories";
  $cate = executeQuery($sql,true);
  $id_u= isset($_SESSION['login']) ? $_SESSION['login']['id'] : '';
  $sql = "SELECT * FROM users where id = $id_u";
  $checkU = executeQuery($sql,false);
  if($checkU['role']!=2){
    echo "<script>
    alert('Bạn ko có quyền truy cập');
      window.location.href='http://localhost/duan_web1/';
    </script>";

  }

	



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once 'layouts/head_tag.php'; ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Danh Mục', 'Số Lượng Sản Phẩm'],
          <?php foreach($cate as $cate): ?>
          ['<?php echo 'Danh Mục '. $cate['cate_name'] ?>',<?php echo $cate['total_product'] ?>],

          <?php endforeach ?>
          
        ]);

        var options = {
          title: 'Biểu Đồ Thống Kê'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  
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
                <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
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
            
            <li><a href="<?php echo Base_url ?>admin/info"><i class="fa fa-info" aria-hidden="true"></i>Thông tin website</a></li>
            <li><a href="<?php echo Base_url ?>admin/slider"><i class="fa fa-sliders" aria-hidden="true"></i>Slide</a></li>
            <li><a href="<?php echo Base_url ?>admin/doitac"><i class="fa fa-bandcamp" aria-hidden="true"></i> Đối Tác</a></li>

            <li><a href="<?php echo Base_url ?>admin/phanhoi"><i class="fa fa-reply" aria-hidden="true"></i>Phản Hồi</a></li>
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
              <h3><?php echo $totalPros['totalPros']; ?></h3>

              <p>Sản Phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/sanpham" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalCates['totalCates']; ?></h3>

              <p>Danh Mục</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/danhmuc" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totalcmts['totalcmts'] ?></h3>

              <p>Bình Luận</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/binhluan" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalbrs['totalbrs'] ?></h3>

              <p>Đối Tác</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/doitac" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalContacts['totalContacts'] ?></h3>

              <p>Phản Hồi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/phanhoi" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totalOrders['totalOrders'] ?></h3>

              <p>Đơn Hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/hoadon" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalUsers['totalUsers'] ?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo Base_url ?>admin/users" class="small-box-footer">Xem Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
       <div class="nav-tabs-custom">
          <div id="piechart" style="width: 100%;height: 400px;overflow:auto;"></div>
          <canvas id="myChart" width="200" height="100"></canvas>
          <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
          });
          </script>
      </div>
  </div>
  <!-- /.content-wrapper -->
 <!-- footer -->
 	<?php include_once 'layouts/footer.php' ?>
 <!-- footer -->
</body>
</html>
