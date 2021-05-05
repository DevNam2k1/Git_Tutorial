<?php session_start();
 if(empty($_SESSION['ten_khach_hang']) && $_SESSION['tinh_trang'] == 2){
  	
  header("location:login.php?error=Bạn chưa đăng nhập hoặc đăng kí");
}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nam Long | Quần áo số 1 Việt Nam</title>
        <link rel="stylesheet" href="../File CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body style="background: ;">
    <?php
   include '../File PHP/top_header.php'; 
  ?>

 <?php 
     include '../File PHP/header_products.php'; 
   ?>
<div class="middle_sidebar">
<?php
  include '../File PHP/sidebar.php'; 
?>

</div>
<!--main container start-->
<div class="main-container">
  <iframe src="../User/Common/front_update.php" name="iframe_a" width="1110px" height="645px"></iframe>
</div>
<!--main container end-->
<br>
<?php 
     include '../File PHP/footer.php'; 
   ?>


    </body>
</html>