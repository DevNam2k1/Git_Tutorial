<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Thêm admin</title>
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

<?php include 'process_insert.php' ?>




 <!--main container start-->
 <div class="main-container">
     <div class="header2">
    <div class="my_profile">
    <div class="top">
    <h1>Thêm quản lí </h1>
    <p>Cấp quyền truy cập cho người dùng.</p>
    </div>   
    <hr>
    <div class="sucess"><?php echo $msg_sucess ?></div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="myForm">
      <label>Họ và Tên</label>
      <input type="text" name="name" value="<?php echo $name ?>"><span class="err"><?php echo $nameError ?></span>

      <label>Ngày Sinh</label>
      <input type="date" name="birthday" value="<?php echo $date ?>"><span class="err"><?php echo $dateError ?></span>
   
      <label>Giới Tính</label>
      <input type="radio" name="gender" id="gender" value="1"<?php if (isset($gender) && $gender=="1") echo "checked";?> > Nam
      <input type="radio" name="gender" id="gender" value="2" <?php if (isset($gender) && $gender=="2") echo "checked";?>> Nữ
      <input type="radio" name="gender" id="gender"<?php if (isset($gender) && $gender=="Khác") echo "checked";?> value="Khác"> Khác
      <br><span class="err"><?php echo $genderError ?></span>
  
      <label>Số điện thoại</label>
      <input type="text" name="phone_number" value="<?php echo $phone ?>"><span class="err"><?php echo $phoneError ?></span>
    
      
      <label>Địa Chỉ</label>
      <input type="text" name="address" value="<?php echo $address ?>"><span class="err"><?php echo $addressError ?></span>

      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email ?>"><span class="err"><?php echo $emailError ?></span>
   
      <label>Mật khẩu</label> 
      <input type="password" name="password" value="<?php echo $pas ?>"><span class="err"><?php echo $pasError ?></span>

      
      <label>CMND</label>
      <input type="text" name="cmnd" value="<?php echo $cmnd ?>"><span class="err"><?php echo $cmndError ?></span>
  
      <label>Cấp Độ</label>
      <input type="radio" name="level" id="gender" value="2" <?php if (isset($level) && $level=="2") echo "checked";?> > Admin
      <br><span class="err"><?php echo $levelError ?></span>
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

 
</body>
</html>
<?php } ?>