<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý thông báo</title>
        <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
        <link rel="stylesheet" href="../../File CSS/dashboard_admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body>


<?php
   include '../Common/sidebar_admin.php'; 
?>


 <!--main container start-->
 <div class="main-container">
     <div class="header2">
    <div class="my_profile">
    <div class="top">
     <?php
         include '../../connect.php';
         $sql = "SELECT * FROM hoa_don WHERE tinh_trang = '1'";
         $result = mysqli_query($connect,$sql);
         $each = mysqli_num_rows($result);
        
     ?>
      <h1>Thông Báo</h1>
    <p>Nơi cập nhật các thông tin.</p>
    </div>   
    <hr>
    <p style="margin-top:50px; margin-left:50px;" >Có tổng số đơn hàng đang chờ duyệt : <b style="color:red;">   <?php    echo $each  ?></b> đơn . <a href="../Quan_ly_hoa_don/cho_duyet.php">Xem chi tiết</a></p>
   
    </div>
    </div>
   
  </div>
            <!--main container end-->

   <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>



   
    <script>
function button(){
  alert ("Bạn xóa thành công!");
}
</script>   
</body>
</html>
<?php } ?>