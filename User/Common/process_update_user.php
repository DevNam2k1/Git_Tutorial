<?php 

if( !empty($_POST['ngay_sinh']) && !empty($_POST['gioi_tinh']) &&
!empty($_POST['sdt_khach_hang']) && !empty($_POST['dia_chi']) ){


  $id = $_POST['id_khach_hang'];
  $name = $_POST['ten_khach_hang'];
  $birthday = $_POST['ngay_sinh'];
  $gender = $_POST['gioi_tinh'];
  $phonenumber = $_POST['sdt_khach_hang'];
  $address = $_POST['dia_chi'];
  $email = $_POST['email'];
 
  include '../../connect.php';

  $sql ="UPDATE khach_hang 
  set
  ten_khach_hang = '$name',
  ngay_sinh = '$birthday',
  gioi_tinh = ' $gender',
  sdt_khach_hang = '$phonenumber',
  dia_chi = '$address',
  email = '$email'
  WHERE
  id_khach_hang = '$id'
  ";
  
  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header("location:front_update.php?scuess=Cập nhật thành công!");
} else {
  header("location:front_update.php?error=Hãy nhập đủ thông tin!");
}
?>