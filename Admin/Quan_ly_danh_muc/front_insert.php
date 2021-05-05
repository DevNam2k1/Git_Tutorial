<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Thêm sản phẩm</title>
        <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
        <link rel="stylesheet" href="../../File CSS/dashboard_admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <style>
           .err{
               padding-top:10px;
               color:red;
               margin-left:100px;
           }
           .sucess{
                padding-top:10px;
               color:green;
               margin-left:100px; 
           }
           #btn1{
            display: inline-block; 
             background: #ff523b;
             padding: 8px 30px;
             margin: 30px 0;
             border-radius: 30px;
             transition: 0.5s;
              text-decoration:none;
           }
           #btn1 a{
            color:#fff;
           }
        </style>
    </head>
    <body>


<?php
   include '../Common/sidebar_admin.php'; 
?>


 <!--main container start-->
 <div class="main-container">
    <div class="header2">
    <div class="my_profile">
    <div class="top">
    <h1>Thêm danh mục </h1>
    <p>Nơi thêm danh mục cho người dùng.</p>
    </div>   
    <hr>
   
    <?php include 'process_insert.php' ?>

    <div class="sucess"><?php echo $msg_sucess ?></div>
    <form enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <label>Tên danh mục</label>
      <input type="text" name="ten_danh_muc" value="<?php echo $product ?>" >
      <span class="err"><?php echo $errProduct ?></span>

      <br>
     
      <button type="submit" class="btn" name="submit">Thêm</button>
      <button id="btn1"><a href="front_insert.php" >Đặt lại</a></button>
    </form>
    
 

    </div>
    </div>
   
  </div>
            <!--main container end-->

   <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>

 
 <script>
       function img() {
           document.getElementById("file").click();
       }

 </script>
    
  

</body>
</html>
<?php } ?>