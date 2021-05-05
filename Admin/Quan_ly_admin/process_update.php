<?php 
if(!empty($_POST['id_admin']) && !empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['phone_number']) &&
!empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cmnd']) && 
!empty($_POST['level'])  ){
  $id = $_POST['id_admin'];
  $name = $_POST['name'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phonenumber = $_POST['phone_number'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cmnd = $_POST['cmnd'];
  $level = $_POST['level'];

  include '../../connect.php';

  $sql ="UPDATE admin 
  set
  name = '$name',
  birthday = '$birthday',
  gender = ' $gender',
  phone_number = '$phonenumber',
  address = '$address',
  email = '$email',
  password = '$password',
  cmnd = '$cmnd',
  level = '$level'
  WHERE
  id_admin = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
} else {
  header('location:index.php?error=Hãy nhập đủ thông tin!');
}
?>