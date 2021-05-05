<?php session_start(); 
 include '../connect.php';
 if(!empty($_SESSION['id_khach_hang'])){
   
  $id = $_SESSION['id_khach_hang'];
  $sql1 = "SELECT * FROM khach_hang where id_khach_hang = '$id'";
  $result1 = mysqli_query($connect,$sql1);
  $row = mysqli_fetch_array($result1);
 } else {
   $id = "";
   $row['tinh_trang_khach_hang'] = 1;
 }

if( $row['tinh_trang_khach_hang'] == 2 ){ ?>
  <p>Tài khoản của bạn đã bị vô hiệu hóa. Bạn có liên hệ với chúng tôi để cấp lại quyền qua form bên dưới.</p>
    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeCajwiGyoacR-3xUsZeutIX_8qytmN4GG19mEDvYer_NrqXw/viewform?embedded=true" 
  width="640" height="1100px" frameborder="0" marginheight="0" marginwidth="0">Đang tải…</iframe>
  <?php  } else {
    ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nam Long | Quần áo số 1 Việt Nam</title>
        <link rel="stylesheet" href="../File CSS/style.css">
        <link rel="stylesheet" href="../File CSS/comment.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
   include '../File PHP/top_header.php'; 
  ?>
   <?php 
     include '../File PHP/header_products_detail.php'; 
   ?>
    
    <?php 
     include '../File PHP/main_products_detail.php'; 
   ?>
    <?php 
     include '../File PHP/footer.php'; 
   ?>
  <script src="../File JS/toggle_menu.js"></script>
  <script src="../File JS/product_gallery.js"></script>
</body>
</html>


<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();

  $.ajax({
   url:"../File PHP/add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"../File PHP/fetch_comment.php?id=<?php echo $id ?>",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>

<?php } ?>