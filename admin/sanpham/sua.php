<?php 
  session_start();
	require_once '../../commons/db.php';
  if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    header('location:'.Base_url);
  }
  $id=$_GET['id'];
  $sql = "select
          *
          from products where id ='$id'";
  $product =executeQuery($sql,false);
  $sql = "select * from categories";
  $categories=executeQuery($sql,true);
	
  if(isset($_POST['submit'])){
    $url='C:/xampp/htdocs/duan_web1/public/images/';
    $filename = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_type = $_FILES['fileToUpload']['type'];
    $product_name =$_POST['name'];
    $product_amount =$_POST['amount'];
    $product_price =$_POST['price'];
    $category=$_POST['categories'];
    $commentStatus=$_POST['comments'];
    $desc_short = $_POST['motangan'];
    $desc_detail = $_POST['mota'];
    $sale_off=$_POST['sale_off'];
    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
    if(empty($product_name) || empty($product_amount) || empty($product_price) || empty($desc_detail)
     || empty($desc_short))
    {
      if (empty($product_name)) {
        $errName= "Bạn chưa nhập tên sản phẩm";
       
      }
      if (empty($product_amount)) {
        $errAmount="Bạn chưa nhập số lượng ";
      }
      if (empty($product_price)) {
        $errPrice= "Bạn chưa nhập giá ";
      }
      if(empty($desc_short)){
        $errDesc_short= "Bạn chưa nhập mô tả ngắn";
      }
      if(empty($desc_detail)){
        $errDesc_detail= "Bạn chưa nhập mô tả chi tiết";
      }
      
    }
    elseif (!is_numeric($product_price) || !is_numeric($product_amount)) {
        $err= " Bạn phải nhập số vào 2 mục số lượng và giá ";
        
    }
    elseif($filename==''){
        $update_product = "UPDATE products SET cate_id='$category', name = '$product_name', amount = '$product_amount', price = '$product_price',sale_off='$sale_off',disabled_comment='$commentStatus',
        desc_short='$desc_short',detail='$desc_detail' WHERE id = $id";
        executeQuery($update_product);
        header("location:".Base_url."admin/sanpham");
    }

    else{
        
        if($file_size > 2000000){
          $errSize= "File của bạn quá lớn file của bạn phải nhỏ hơn < 2MB";
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
          $errType= "File phải có định dạng jpg , png , jpeg";
        }
        
        else{
          $update_product = "UPDATE products SET cate_id='$category', name = '$product_name', amount = '$product_amount', price = '$product_price',disabled_comment='$commentStatus',image='public/images/$filename',desc_short='$desc_short',detail='$desc_detail' WHERE id = $id";
          var_dump($update_product);
          executeQuery($update_product);
          move_uploaded_file($tmp_name,$url.$filename);
          var_dump(move_uploaded_file($tmp_name,$url.$filename));
          header("location:".Base_url."admin/sanpham");
         
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
        Sửa sản phẩm
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản Phẩm</li>
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
              <?php endif ?>
            </span>
            <br>
            <label>Tên Sản Phẩm</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" name="name" id="exampleFormControlFile1" 
            value="<?php echo $product['name'] ?>">
            <span class="text-danger"><?php if(isset($errName)) echo $errName; ?></span>
            <br>
            
            <label>Danh Mục</label>  
                <select class="col-3 container-fluid form-control form-control-default" name="categories">
                    <?php foreach ($categories as $key): ?>
                    <option 
                        <?php if ($product['cate_id'] == $key['id']): ?>
                            selected
                          <?php endif ?>
                        value="<?php echo $key['id'] ?>">
                        <?php echo $key['cate_name'] ?>
                    </option>
                    <?php endforeach ?>
                </select>    
            <br>
            <label>Số Lượng</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" 
             name="amount" id="exampleFormControlFile1"
              value="<?php echo $product['amount'] ?>">
            <span class="text-danger"><?php if(isset($errAmount)) echo $errAmount; ?></span>
            <br>
            <label>Giá</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" class="form-control-file" name="price" id="exampleFormControlFile1"
            value="<?php echo $product['price'] ?>">
            <span class="text-danger"><?php if(isset($errPrice)) echo $errPrice; ?></span>
            <br>
             <label>Giảm Giá</label>
            <input class="col-3 form-control container-fluid form-control-default" type="text" class="form-control-file" name="sale_off" id="exampleFormControlFile1"
            value="<?php echo $product['sale_off'] ?>">
            <br>
            <label>Trang Thái Bình Luận</label>
            <select class="col-3 container-fluid form-control form-control-default" name="comments">
              <?php foreach ($disabled_cmt as $key => $value): ?> 
              <option 
                <?php if ($product['disabled_comment'] == $value): ?>
                    selected
                  <?php endif; ?>
                value="<?php echo $value; ?>">
                <?php echo $key; ?>
              </option>
              <?php endforeach; ?>
            </select>
            <br>
            <label style="cursor: pointer;" class="text-center" for="fileUPLOAD">
              <i style="font-size: 23px;" class="fa fa-cloud-upload" aria-hidden="true">
              </i>
              <span id="show_msg" style="font-size: 15px">Tải Lên Ảnh</span>
              
            </label>
            
            <br>
            <img style="height: 200px;" class="img-thumbnail col-lg-12 form-group" width="385px" alt="Responsive image" src="<?php echo Base_url.$product['image'] ?>">
            <br> 
            <input style="display: none;" type="file" name="fileToUpload" id="fileUPLOAD">
            <input type="submit" class="ppn col-2 container-fluid btn btn-success btn-sm" value="Sửa Sản Phẩm" name="submit">
            <a href="<?php echo Base_url."admin/sanpham" ?>" class="col-2 container-fluid btn btn btn-danger  btn-sm">Hủy</a>
          </div>
          <div class="rows col-lg-6">
             <br>
              <label>Mô tả ngắn</label>
                <textarea id="editor1" name="motangan" rows="2" cols="1000">
                    <?php echo $product['desc_short'] ?>
                </textarea>
              <span class="text-danger"><?php if(isset($errDesc_short)) echo $errDesc_short; ?></span>
              <br>
              <label>Mô tả chi tiết</label>
                <textarea id="editor1" name="mota" rows="10" cols="1000"> 
                    <?php echo $product['detail'] ?>
                </textarea>
              <span class="text-danger"><?php if(isset($errDesc_detail)) echo $errDesc_detail; ?></span>
              <br>
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
