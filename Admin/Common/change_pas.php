<?php session_start() ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <style>
 .header2 .error {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #a94442;
    color: #a94442;
    border-radius:5px;
    background: #f2dede;
    text-align: left; 
    font-size: 16px;
    font-family: 'Times New Roman', Times, serif;
}
.header2 .sucess {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #1ae907;
    color: #1ae907;
    border-radius:5px;
    background:  #9ff597;
    text-align: left; 
    font-size: 16px;
}
    </style>
        <meta charset="utf-8">
        <title>Sidebar Dashboard Template With Sub Menu</title>
        <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
        <link rel="stylesheet" href="../../File CSS/dashboard_admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body>


<?php
  include 'sidebar_admin.php'; 
?>


 <!--main container start-->
 <div class="main-container">
    
 <div class="header2">
    <div class="my_profile">
    <div class="top">
    <h1>Đổi mật khẩu</h1>
    <p>Nơi thay đổi mật khẩu cá nhân.</p>
    </div>   
    <hr>
        <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <?php if(isset($_GET['sucess'])){ ?>
            <br>
            <p class="sucess"><?php echo $_GET['sucess']; ?> </p>
         <?php } ?>
    <?php 
        $id = $_SESSION['name'];
        include '../../connect.php';
        $sql = "SELECT * FROM admin WHERE name = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
?>
    <form action="process_update_pas.php" method="post">
        <input type="hidden" name="id_admin" value="<?php echo $id ?>">
      <label>Mật khẩu cũ</label>
      <input type="password" name="mat_khau"  value=""><span style="margin-left:100px; "><a href="">Quên mật khẩu?</a></span>

      <label>Mật khẩu mới</label>
      <input type="password" name="mat_khau_1" value="">
       
       <label>Xác nhận mật khẩu mới</label>
      <input type="password" name="mat_khau_2" value="">
     
      <br>
      <button type="submit" class="btn" name="submit">Lưu</button>
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

    </body>
</html>
  
