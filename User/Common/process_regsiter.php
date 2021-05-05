<?php 

if(!empty($_POST['ten_khach_hang']) && !empty($_POST['email']) && !empty($_POST['password_1']) && !empty($_POST['password_2'])){
    $username = $_POST['ten_khach_hang'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $maker = $_POST['tinh_trang'];

  //connect to the database
   include '../../connect.php';
     
         if($password_1 == $password_2){
         	$password = $password_1; 
         	$sql = "INSERT INTO khach_hang(ten_khach_hang, email, password,tinh_trang_khach_hang)
         	         VALUES ('$username', '$email' , '$password','$maker')";
         	mysqli_query($connect, $sql);
          header("location:../login.php?sucess=Đăng kí thành công!");
         } else{
           header("location:../regsiter.php?error=Hai mật khẩu không giống nhau");
         }
   } else {
    header("location:../regsiter.php?error=Hãy điền đủ thông tin");
   }
  
?>