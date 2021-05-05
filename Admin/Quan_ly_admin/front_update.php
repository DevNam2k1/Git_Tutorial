
<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cập nhật admin</title>
        <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
        <link rel="stylesheet" href="../../File CSS/dashboard_admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
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
    <h1>Sửa quản lý </h1>
    <p>Sửa chữa quyền truy cập cho người dùng.</p>
    </div>   
    <hr>
    <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?> </p>
    <?php } ?>
    <?php 
        $id = $_GET['id_admin'];
        include '../../connect.php';
        $sql = "SELECT * FROM admin WHERE id_admin = '$id'";
        $result1 = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result1);
 
?>
    <form action="process_update.php" method="post">
        <input type="hidden" name="id_admin" value="<?php echo $id ?>">
      <label>Họ và Tên</label>
      <input type="text" name="name" value="<?php echo $each['name'] ?>">

      <label>Ngày Sinh</label>
      <input type="date" name="birthday" value="<?php echo $each['birthday'] ?>">

      <label>Giới Tính</label>
      <input type="radio" name="gender" id="gender" value="1" <?php if($each['gender']=="1") echo "checked"; ?> > Nam
      <input type="radio" name="gender" id="gender" value="2" <?php if($each['gender']=="2") echo "checked"; ?> > Nữ
      <input type="radio" name="gender" id="gender" value="3"> Khác
      
      <label>Số điện thoại</label>
      <input type="number" name="phone_number" value="<?php echo $each['phone_number'] ?>">

      <label>Địa Chỉ</label>
      <input type="text" name="address" value="<?php echo $each['address'] ?>">

      <label>Email</label>
      <input type="email" name="email" value="<?php echo $each['email'] ?>">

      <label>Mật khẩu</label>
      <input type="password" name="password" value="<?php echo $each['password'] ?>">

      <label>CMND</label>
      <input type="number" name="cmnd" value="<?php echo $each['cmnd'] ?>">
       
      <label>Cấp Độ</label>
      <input type="radio" name="level" id="gender" value="2" <?php if($each['level']=="2") echo "checked"; ?>> Admin
      <br>
      <button type="submit" class="btn" name="submit"  onclick="button()">Sửa</button>
    </form>
    
 
    <script>
function button(){
  alert ("Bạn sửa thành công!");
}
</script>   
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
