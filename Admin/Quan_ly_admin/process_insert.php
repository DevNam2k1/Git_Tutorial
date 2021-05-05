<?php 
   include '../../connect.php';
   mysqli_query($connect,'SET NAMES UTF8');
  $name = $date = $gender = $phone = $address = $email = $pas = $cmnd = $level = $msg_sucess = "";
  $nameError = $dateError = $genderError  = $phoneError = $addressError = $pasError = $cmndError = $levelError = $emailError = "";
  $error = false;
  if($_SERVER['REQUEST_METHOD']=="POST"){
      if(empty($_POST['name'])){
             $nameError = "Vui lòng nhập họ tên!";
             $error = true;
      } else {
          $name = $_POST['name'];
          
      }
      if(empty($_POST['birthday'])){
             $dateError = "Vui lòng nhập ngày sinh!";
             $error = true;
      } else {
          $date = $_POST['birthday'];
       
      }
      if(empty($_POST['gender'])){
             $genderError = "Vui lòng nhập giới tính!";
             $error = true;
      } else {
          $gender = $_POST['gender'];
        
      }
      if(empty($_POST['phone_number'])){
             $phoneError = "Vui lòng nhập số điện thoại!";
             $error = true;
      } else {
          $phone = $_POST['phone_number'];
          if(!preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$phone)){
             $phoneError = "Số điện thoại của bạn không đúng định dạng!";
          }
      }
      if(empty($_POST['address'])){
             $addressError = "Vui lòng nhập địa chỉ!";
             $error = true;
      } else {
          $address = $_POST['address'];
         
      }
      if(empty($_POST['email'])){
             $emailError = "Vui lòng nhập email!";
             $error = true;
      } else {
          $email = $_POST['email'];
          //check mail
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
      }
      if(empty($_POST['password'])){
             $pasError = "Vui lòng nhập mật khẩu!";
             $error = true;
      } else {
          $pas = $_POST['password'];
          if (strlen($_POST["password"]) <= '8') {
            $pasError = "Mật khẩu của bạn phải chứa ít nhất 8 ký tự!";
        }
        elseif(!preg_match("#[0-9]+#",$pas)) {
            $pasError = "Mật khẩu của bạn phải chứa ít nhất 1 số!";
        }
        elseif(!preg_match("#[A-Z]+#",$pas)) {
            $pasError = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái viết hoa!";
        }
        elseif(!preg_match("#[a-z]+#",$pas)) {
            $pasError = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường!";
        }
         
      }
      if(empty($_POST['cmnd'])){
             $cmndError = "Vui lòng nhập chứng minh hoặc căn cước!";
             $error = true;
      } else {
          $cmnd = $_POST['cmnd'];
         
      }
      if(empty($_POST['level'])){
             $levelError = "Vui lòng nhập cấp độ!";
             $error = true;
      } else {
          $level = $_POST['level'];
          
      }
      

      if(!$error){
          $msg_sucess = "Thêm tài khoản thành công!";
          $sql = "INSERT INTO `admin`( `name`, `gender`, `phone_number`, `address`, `birthday`, `email`, `password`, `cmnd`, `level`)
           VALUES ('$name','$gender','$phone','$address','$date','$email','$pas','$cmnd','$level')";
           mysqli_query($connect,$sql);
           mysqli_close($connect);
      }
  }

?> 

