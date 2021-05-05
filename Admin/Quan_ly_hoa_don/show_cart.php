<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Chi tiết hóa đơn</title>
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
      $tong_tat_ca = 0;
      $ma_hoa_don = $_GET['id'];
       $thu_muc_anh = '../../File image/';
       include '../../connect.php';
       mysqli_query($connect,'SET NAMES UTF8');
       $sql = "SELECT hd_chi_tiet.*,hoa_don.*,
        san_pham.ten_san_pham,
        san_pham.file_anh
        FROM hd_chi_tiet 
        join san_pham on  san_pham.id  = hd_chi_tiet.ma_san_pham
        join hoa_don on hoa_don.id = hd_chi_tiet.ma_hoa_don
        WHERE ma_hoa_don = '$ma_hoa_don'
       ";
       
       $result = mysqli_query($connect,$sql);
      ?>
    <h1>Danh sách đơn hàng chi tiết</h1>
    <p>Nơi xem chi tiết sản phẩm.</p>
    </div>   
    <hr>
    <table >
    
      <tr>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ảnh Sản phẩm</th>
        <th>Thành tiền</th>
        
        
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['ten_san_pham'] ?>
           </td>
           <td>
           <?php echo $each['gia'] ?>
           </td>
           <td>
           <?php echo $each['so_luong'] ?>
           </td>
           <td>
           <img width="100px" height="100px" src="<?php echo $thu_muc_anh . $each['file_anh'] ?>" >
           </td>

           <td>
           <?php echo $each['gia']*$each['so_luong'] ?>
           <?php $tong_tat_ca += $each['gia'] * $each['so_luong'] ?>

           </td>
      </tr>
      
      <?php endforeach ?>
      <tr id="row-total" style="border: none;">
                        
                        <td style="border: none;"><h4>Tổng tiền:</h4></td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;"><h4><?php echo (number_format($tong_tat_ca, 0, ",", ".")." "."VNĐ") ?></h4></td>
                        
      </tr>
      <tr>
      <?php if($each['tinh_trang']==1) { ?>
                        <td style="border: none;"><h5>Xét Duyệt Tính Trạng:</h5></td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">
             
             <a href="change_tinh_trang.php?id=<?php echo $each['id'] ?>&tinh_trang=2" style="text-decoration:none; color:white; background: #02531dbd;" onclick="button2()">Duyệt</a>
             <a href="change_tinh_trang.php?id=<?php echo $each['id'] ?>&tinh_trang=3"  style="text-decoration:none; color:white; background:red;" onclick="button()">Hủy</a>
             
           </td>
           <?php } ?>
      </tr>
    </table><br>
    <a href="javascript:history.back()" style="text-decoration:none; color:gray; border:1px solid gray;"><== Quay lại</a>
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
  alert ("Hủy đơn hàng thành công!");
}
</script>   

 <script>
function button2(){
  alert ("Duyệt đơn hàng thành công!");
}
</script>   
 
</body>
</html>

    
<?php } ?>