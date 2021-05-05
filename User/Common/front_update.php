<?php session_start(); 
if(empty($_SESSION['ten_khach_hang']) && $_SESSION['tinh_trang'] == 2 ){
  	
      header("location:login.php?error=Bạn chưa đăng nhập hoặc đăng kí");
    } else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Quần áo số 1 Việt Nam</title>
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
    <div class="header">
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
    <?php if(isset($_GET['scuess'])){ ?>
            <br>
            <p class="scuess"><?php echo $_GET['scuess']; ?> </p>
    <?php } ?>
    <?php 
        $id = $_SESSION['id_khach_hang'];
        include '../../connect.php';
        $sql = "SELECT * FROM khach_hang WHERE id_khach_hang = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
?>
    <form action="process_update_user.php" method="post">
        <input type="hidden" name="id_khach_hang" value="<?php echo $id ?>">
      <label>Họ và Tên</label>
      <input type="text" name="ten_khach_hang" placeholder="Họ và Tên" value="<?php echo $each['ten_khach_hang'] ?>">

      <label>Ngày Sinh</label>
      <input type="date" name="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>">

      <label>Giới Tính</label>
      <input type="radio" name="gioi_tinh" id="gender" value="1" <?php if($each['gioi_tinh']=="1") echo "checked"; ?> > Nam
      <input type="radio" name="gioi_tinh" id="gender" value="0" <?php  if($each['gioi_tinh']=="0") echo "checked"; ?> > Nữ
      <input type="radio" name="gioi_tinh" id="gender" value="2"> Khác
      
      <label>Số điện thoại</label>
      <input type="number" name="sdt_khach_hang" placeholder="Số điện thoại" value="<?php  echo $each['sdt_khach_hang']  ?>">

      <label>Địa Chỉ</label>
      <input type="text" name="dia_chi" placeholder="Địa Chỉ"  value="<?php  echo $each['dia_chi']  ?>">

      <label>Email</label>
      <input type="email" name="email" placeholder="Email" value="<?php echo $each['email'] ?>" >
      
      <br>
      <button type="submit" class="btn" name="submit">Lưu</button>
    </form>
    
 

    </div>
    </div>
  

</body>
</html>
<?php } ?>