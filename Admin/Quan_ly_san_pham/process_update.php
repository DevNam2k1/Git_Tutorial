<?php 
if(!empty($_POST['id']) && !empty($_POST['ten_san_pham']) && !empty($_POST['gia']) && !empty($_POST['so_luong']) && !empty($_POST['mo_ta']) &&
!empty($_FILES['file_anh_new']) && !empty($_POST['ma_danh_muc']) && !empty($_POST['ten_hang'])){


  $id = $_POST['id'];
  $ten_san_pham = $_POST['ten_san_pham'];
  $gia = $_POST['gia'];
  $so_luong = $_POST['so_luong'];
  $mo_ta = $_POST['mo_ta'];
  $file_anh = $_FILES['file_anh_new'];
  $ten_hang = $_POST['ten_hang'];
  $ma_danh_muc = $_POST['ma_danh_muc'];
   
  
   

  if($file_anh['size'] > 0 ){
    $thu_muc_anh = '../../File image/';
    move_uploaded_file($file_anh['tmp_name'],$thu_muc_anh . $file_anh['name']);
    $ten_file_anh = $file_anh['name'];
  } else {
    $ten_file_anh = $_POST['file_anh_old'];
  }
 

  include '../../connect.php';

  $sql ="UPDATE san_pham 
  set
  ten_san_pham = '$ten_san_pham',
  gia = '$gia',
  so_luong = '$so_luong',
  mo_ta = ' $mo_ta',
  file_anh = '$ten_file_anh',
  ten_hang = '$ten_hang',
  ma_danh_muc = '$ma_danh_muc'
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