<?php 
if( !empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['gender']) &&
!empty($_POST['phone_number']) && !empty($_POST['address']) && !empty($_POST['email'])  ){
  $id = $_POST['id_admin'];
  $name = $_POST['name'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phonenumber = $_POST['phone_number'];
  $address = $_POST['address'];
  $email = $_POST['email'];
 
  include '../../connect.php';

  $sql ="UPDATE admin
  set
  name = '$name',
  birthday = '$birthday',
  gender = ' $gender',
  phone_number = '$phonenumber',
  address = '$address',
  email = '$email'
  WHERE
  name = '$id'
  ";
  
  mysqli_query($connect,$sql);
  mysqli_close($connect);
 
  header("location:profile.php?sucess= Cập nhật thành công");
  
} else {
  
    header("location:profile.php?error= Hãy nhập đủ thông tin");
    
  
}
?>