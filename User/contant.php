<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../File CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <style>
       .main{
           margin-top:30px;
           background: radial-gradient( #ffd6d6,#fff );
       }
       .main h1{
           text-align:center;
       } 
       .main ul{
           margin-left:100px;
           color: red;
           font-size:20px;
       }
       .main p{
           margin-left:60px;
           
       }
       .main iframe{
        margin-left:30%;
       }
      
    </style>
</head>
<body>
<?php
   include '../File PHP/top_header.php'; 
  ?>
   <?php 
     include '../File PHP/header_products_detail.php'; 
   ?>
  <div class="main">
  <br><br>
  <h1>Liện Hệ Chúng Tôi</h1>
  <br>
  <p>Mọi yêu cầu hỗ trợ về nội dung hoặc đề nghị hợp tác . <br> Các bạn có thể liên 
  hệ gửi về: </p>
  <br>
  <ul>
     <li>Địa Chỉ: PHẠM HOÀNG LONG - Nhà 10 , ngõ 86, đường Nguyễn Trãi, Hà Nội</li>
     <li>Gmail: hoanglong2910@gmail.com</li>
     <li>Số điện thoại : 0987625415</li>
  </ul>
  <br>
  <p>Hoặc sử dụng form bên dưới:</p>
  <br>
  <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeCajwiGyoacR-3xUsZeutIX_8qytmN4GG19mEDvYer_NrqXw/viewform?embedded=true" 
  width="640" height="1100px" frameborder="0" marginheight="0" marginwidth="0">Đang tải…</iframe>
  
  </div>
 
<?php 
     include '../File PHP/footer.php'; 
   ?>
</body>
</html>