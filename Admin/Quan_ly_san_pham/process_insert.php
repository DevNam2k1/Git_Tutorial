<?php 
       include '../../connect.php';
       $thu_muc_anh = '../../File image/';
       mysqli_query($connect,'SET NAMES UTF8');

      $sql_danh_muc = "SELECT * FROM danh_muc";
      $result_danh_muc = mysqli_query($connect,$sql_danh_muc);
      if(!empty($_POST['tinh_trang'])){
        $character = $_POST['tinh_trang'];
      };
     

      $product = $price = $quality = $image = $comment = $maker = $list=$msg_sucess= "";
      $errProduct = $errPrice = $errQuality = $errImage = $errComment =$errList = $errMaker =  "";
      $error = false;
      if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['ten_san_pham'])){
             $errProduct = "*Vui lòng nhập sản phẩm!";
             $error = true;
             } else {
             $product = $_POST['ten_san_pham'];
             }
             if(empty($_POST['gia'])){
             $errPrice = "*Vui lòng nhập giá!";
             $error = true;
             } else {
             $price = $_POST['gia'];
             }
             if(empty($_POST['so_luong'])){
             $errQuality = "*Vui lòng nhập số lượng!";
             $error = true;
             } else {
             $quality = $_POST['so_luong'];
             }
             if(empty($_FILES['file_anh'])){
             $errImage = "*Vui lòng chọn file ảnh!";
             $error = true;
             } else  {
             $image = $_FILES['file_anh'];
              if($image['size']>0){
                move_uploaded_file($image['tmp_name'],$thu_muc_anh . $image['name']);
                $ten_file_anh = $image['name'];
              } else {
                 $ten_file_anh = $_POST['file_anh_old'];
              }
            
             
             }
             if(empty($_POST['mo_ta'])){
             $errComment = "*Vui lòng nhập mô tả !";
             $error = true;
             } else {
             $comment = $_POST['mo_ta'];
             }
              if(empty($_POST['ten_hang'])){
             $errMaker = "*Vui lòng nhập hãng sản phẩm!";
             } else {
               $maker = $_POST['ten_hang'];
             }
             if(empty($_POST['ma_danh_muc'])){
             $errList = "*Vui lòng chọn danh mục!";
             $error = true;
             } else {
             $list = $_POST['ma_danh_muc'];
             }

             if(!$error){
                $msg_sucess = "Thêm sản phẩm thành công!";
                $sql ="INSERT INTO san_pham(ten_san_pham,gia,so_luong,mo_ta,file_anh,ten_hang,ma_danh_muc,tinh_trang)
                 VALUES ('$product','$price','$quality','$comment','$ten_file_anh','$maker','$list','$character')";

                mysqli_query($connect,$sql);
                mysqli_close($connect);
            }
      }
    ?>