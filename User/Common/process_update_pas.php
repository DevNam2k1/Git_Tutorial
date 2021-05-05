<?php 
if(!empty($_POST['id_khach_hang']) && !empty($_POST['mat_khau_1']) && !empty($_POST['mat_khau_2']))
{
  $id = $_POST['id_khach_hang'];
  $password_1 = $_POST['mat_khau_1'];
  $password_2 = $_POST['mat_khau_2'];
  include '../../connect.php';
  if($password_1 == $password_2){
    $password = $password_1; 
  $sql ="UPDATE khach_hang 
  set
  password = '$password'
  WHERE
  id_khach_hang = '$id'
  ";
  	mysqli_query($connect, $sql);
      header("location:change_pas.php?sucess=Đăng kí thành công!");
  } else {
    header("location:change_pas.php?error=Hai mật khẩu không giống nhau");
  }
} else {
  header("location:change_pas.php?error=Hãy nhập đủ thông tin!");
}
?>