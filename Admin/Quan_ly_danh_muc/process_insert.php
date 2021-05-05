<?php 
       include '../../connect.php';
       mysqli_query($connect,'SET NAMES UTF8');


      $product = $msg_sucess= "";
      $errProduct  =  "";
      $error = false;
      if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['ten_danh_muc'])){
             $errProduct = "*Vui lòng nhập danh mục!";
             $error = true;
             } else {
             $product = $_POST['ten_danh_muc'];
             }
            

             if(!$error){
                $msg_sucess = "Thêm danh mục thành công!";
                $sql ="INSERT INTO danh_muc(ten_danh_muc)
                 VALUES ('$product')";

                mysqli_query($connect,$sql);
                mysqli_close($connect);
            }
      }
    ?>