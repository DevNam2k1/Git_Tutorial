<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tài Khoản Của Tôi</title>
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
           .scuess{
                padding-top:10px;
               color:green;
               margin-left:100px; 
           }
    </style>
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
    <h1>Hồ Sơ Của Tôi</h1>
    <p>Nơi lưu trữ thông tin cá nhân.</p>
    </div>   
    <hr>
    <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="err"><?php echo $_GET['error']; ?> </p>
    <?php } ?>
    <?php if(isset($_GET['sucess'])){ ?>
            <br>
            <p class="scuess"><?php echo $_GET['sucess']; ?> </p>
    <?php } ?>
    <?php 
        include '../../connect.php';
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM admin WHERE name = '$name'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        
?>
    <form action="process_update_admin.php" method="post">
        <input type="hidden" name="id_admin" value="<?php echo $name ?>">
      <label>Họ và Tên</label>
      <input type="text" name="name" placeholder="Họ và Tên" value="<?php echo $each['name'] ?>">

      <label>Ngày Sinh</label>
      <input type="date" name="birthday" value="<?php echo $each['birthday'] ?>">

      <label>Giới Tính</label>
      <input type="radio" name="gender" id="gender" value="1" <?php if ( $each['gender']=="1"){ echo "checked";}?>> Nam
      <input type="radio" name="gender" id="gender" value="2" <?php if ($each['gender']=="2"){ echo "checked";}?>  > Nữ
      <input type="radio" name="gender" id="gender" value="Khác"> Khác
      
      <label>Số điện thoại</label>
      <input type="number" name="phone_number" placeholder="Số điện thoại" value="<?php  echo $each['phone_number']  ?>">

      <label>Địa Chỉ</label>
      <input type="text" name="address" placeholder="Địa Chỉ"  value="<?php  echo $each['address']  ?>">

      <label>Email</label>
      <input type="email" name="email" placeholder="Email" value="<?php echo $each['email'] ?>" >
      
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
<?php } ?>