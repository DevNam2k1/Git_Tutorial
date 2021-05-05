<?php 
  
   $email = $_POST['email'];
   $password = $_POST['password'];

   $connect = mysqli_connect('localhost','root','','project1');

   $sql = "SELECT * FROM khach_hang WHERE 
       email ='$email' AND password ='$password'";
   $result = mysqli_query($connect,$sql);

   //dem_ket_qua
   $dem_ket_qua = mysqli_num_rows($result);

   if($dem_ket_qua == 1){
   	  session_start();
   	  $each = mysqli_fetch_array($result);
   	  $_SESSION['id_khach_hang'] = $each['id_khach_hang'];
   	  $_SESSION['ten_khach_hang'] = $each['ten_khach_hang'];
        
    header("location:../index.php");
      
   }
   else
   {
    header("location:../login.php?error=Tài khoản hoặc mật khẩu sai");
   }
 
?>