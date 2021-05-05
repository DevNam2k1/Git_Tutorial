<?php session_start();
 if(empty($_SESSION['ten_khach_hang'])){
  	
  header("location:login.php?error=Bạn chưa đăng nhập hoặc đăng kí");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nam Long | Quần áo số 1 Việt Nam</title>
</head>
<body>

    <div class="header2">
    <div class="my_profile">
    <div class="top">
      <?php 
        
        $id = $_SESSION['id_khach_hang'];
        include '../../connect.php';
        mysqli_query($connect,'SET NAMES UTF8');
        $sql = "SELECT 
         *
         FROM hoa_don 
         WHERE id_khach_hang = '$id';
         ";
        $result = mysqli_query($connect,$sql);
    
     ?>  
    <h1>Danh sách đơn hàng</h1>
    <p>Nơi quản lý đơn hàng.</p>
    </div>   
    <hr>

    

    
    <table>
    
      <tr>
        <th>Tên người nhận</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Xem đơn</th>
        <th>Ngày tạo</th>
        <th>Tình trạng</th>
  
    
        
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['ten_nguoi_nhan'] ?>
           </td>
           <td>
           <?php echo $each['dia_chi_nguoi_nhan'] ?>
           </td>
           <td>
           <?php echo $each['sdt_nguoi_nhan'] ?>
           </td>

           <td>
             <a href="show_cart.php?id=<?php echo $each['id'] ?>" style="text-decoration:none; color:gray;">Xem</a>
           </td>

           <td>
           <?php echo date_format(date_create($each['thoi_gian_dat_hang']),'d-m-Y') ?>
           </td>
           <td>
            <?php if($each['tinh_trang'] == 1){ ?>
              <span style="color:gray;">Đang chờ duyệt</span>
             <?php  } else if($each['tinh_trang'] == 2){ ?>
              <span style="  color:  #02531dbd;">Đã duyệt</span>
           <?php } else{ ?>
            <span style="color:red;">Đã hủy</span>
        <?php    }
           ?>
           </td>
        
      </tr>
      <?php endforeach ?>
    </table>
    
    </div>
    </div>
    <script>
</script>   
</body>
</html>