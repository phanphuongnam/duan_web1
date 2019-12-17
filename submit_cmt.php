<?php
    session_start(); 
    require_once 'commons/db.php';           
    $product_id=$_POST['pr_id'];
    $content = $_POST['content'];
    if(!isset($_SESSION['login']) || $_SESSION['login']==null) {
       
       header('location:'.Base_url.'detail.php?id='.$product_id.'&err=Bạn cần đăng nhập để bình luận');

    } 
    elseif ($content==""){
        header('location:'.Base_url.'detail.php?id='.$product_id.'&err=Nội dung không được để trống');
      
    } 
	  else{
      $name=$_SESSION['login']['name'];
      $email=$_SESSION['login']['email'];
      $user_id=$_SESSION['login']['id'];
      $sql= "insert into comments
               (content,product_id,user_id)
            values
               ('$content',$product_id,$user_id)";
       executeQuery($sql,true);
       var_dump($sql);
        // header('location:'.Base_url.'detail.php?id='.$product_id);
   }
   
 
  
?>