<?php 
if(!empty($_POST['id']) && !empty($_POST['ten_danh_muc']) ){


  $id = $_POST['id'];
  $ten_danh_muc = $_POST['ten_danh_muc'];

  include '../../connect.php';

  $sql ="UPDATE danh_muc 
  set
  ten_san_pham = '$ten_danh_muc',
  WHERE
  id = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
} else {
  header('location:front_update.php?error= Hãy nhập đủ tất cả thông tin');
}
?>