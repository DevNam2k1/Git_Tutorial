<?php 
if(!empty($_GET['id']) && !empty($_GET['tinh_trang'])){
 $ma_hoa_don = $_GET['id'];
 $tinh_trang = $_GET['tinh_trang'];

 include '../../connect.php';
 $sql = "UPDATE hoa_don 
 set
 tinh_trang = '$tinh_trang'

 where id = '$ma_hoa_don'
 ";
 mysqli_query($connect,$sql);
 mysqli_close($connect);

 
header("location:index.php");
}else {
    header("location:index.php?error=Mã hóa đơn không tồn tại!");
}
?>