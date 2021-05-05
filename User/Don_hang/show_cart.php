<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../File CSS/front_change_pas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nam Long | Quần áo số 1 Việt Nam</title>
</head>
<body>

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
        join hoa_don on hoa_don.id = hd_chi_tiet.ma_hoa_don
        join san_pham on  san_pham.id  = hd_chi_tiet.ma_san_pham
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
      <td style="border: none;"><h5>Hủy Đơn Hàng:</h5></td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">&nbsp;</td>
                        <td style="border: none;">
             
             <a href="change_tinh_trang.php?id=<?php echo $each['id'] ?>&tinh_trang=3"  style="text-decoration:none; color:white; background:red;" onclick="button()">Hủy</a>
            
           </td>
           <?php } ?>
      </tr>
    </table><br>
    <a href="javascript:history.back()" style="text-decoration:none; color:gray; border:1px solid gray;"><b><== Quay lại</b></a>
    </div>
    </div>
    <script>
function button(){
  alert ("Hủy đơn hàng thành công!");
}
</script>   

 
</body>
</html>