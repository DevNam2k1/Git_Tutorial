<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="vn" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý khách hàng</title>
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
        
        $tim_kiem = '';
        if(isset($_GET['tim_kiem'])){
             $tim_kiem = $_GET['tim_kiem'];
           }
   
           $sql = "SELECT * FROM khach_hang
            WHERE ten_khach_hang LIKE '%$tim_kiem%' ;
            ";
     
           $result = mysqli_query($connect,$sql);
   
           $Tong_so_sp = mysqli_num_rows($result);
           $So_sp_tren_1_trang = 4;
           $Tong_so_trang = ceil($Tong_so_sp/$So_sp_tren_1_trang); 
   
           $trang = 1;
           if(isset($_GET['trang'])){
           $trang = $_GET['trang'];
           }
   
           $So_sp_bo_qua = ($trang - 1) * $So_sp_tren_1_trang;
           $sql = "SELECT * FROM khach_hang
           WHERE ten_khach_hang LIKE '%$tim_kiem%' 
           ORDER BY id_khach_hang DESC
           LIMIT $So_sp_tren_1_trang
           OFFSET $So_sp_bo_qua
           
           ;
           ";
            mysqli_query($connect,'SET NAMES UTF8');
            $result = mysqli_query($connect,$sql);
     ?>
    <h1>Danh Sách Khách Hàng</h1>
    <p>Nơi quản lý các khách hàng .</p>
    </div>   
    <hr>
    <div class="Tong_so_trang">
    <h4>Tổng số khách hàng: <?php echo $Tong_so_sp ?></h4> 
     <h5>Tổng số trang: <?php echo $Tong_so_trang ?></h5>
     <form>
       <label>Tìm Kiếm Khách Hàng :</label><input type="search" name="tim_kiem" id="search" >
     </form>
    </div>
    <?php if(mysqli_num_rows($result) != 0){ ?>
    <table>
      <tr>
        <th width="50px">ID</th>
        <th>Họ và Tên</th>
        <th>Số Điện Thoại</th>
        <th>Email</th>
        <th>Ngày Sinh</th>
        <th>Địa Chỉ</th>
        <th>Giới Tính</th>
        <?php if (checkPrivilege('Quan_ly_khach_hang/front_delete.php?id=0')) { ?>
        <th width="50px">Xoá</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_khach_hang/tinhtrang.php?id=0&tinh_trang=0')) { ?>
        <th width="120px">Tính Trạng</th>
        <?php } ?>
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['id_khach_hang'] ?>
           </td>
           <td>
           <?php echo $each['ten_khach_hang'] ?>
           </td>
           <td>
           <?php echo $each['sdt_khach_hang'] ?>
           </td>
           <td>
           <?php echo $each['email'] ?>
           </td>
           <td>
           <?php echo date_format(date_create($each['ngay_sinh']),'d-m-Y') ?>
           </td>
           <td>
           <?php echo $each['dia_chi'] ?>
           </td>
           <td>
           <?php if( $each['gioi_tinh'] == 1){
             echo "Nam";
           } else if($each['gioi_tinh'] == 0){
             echo "Nữ";
           } else {
             echo "Khác";
           }
           ?>
           </td>
           <?php if (checkPrivilege('Quan_ly_khach_hang/front_delete.php?id='.$each['id_khach_hang'])) { ?>
           <td>
           
             <a href="front_delete.php?id=<?php echo $each['id_khach_hang'] ?>" id="button" onclick="button()">Xóa</a>
           </td>
           <?php } ?>
           <?php if (checkPrivilege('Quan_ly_khach_hang/tinhtrang.php?id=0&tinh_trang=1')) { ?>
           <td>
           <?php if ($each['tinh_trang_khach_hang'] == 1) { ?>
              <button><a style="text-decoration: none" href="tinhtrang.php?id=<?= $each['id_khach_hang'] ?>&tinh_trang=2">Vô Hiệu</a></button>
             <?php } else if ($each['tinh_trang_khach_hang'] == 2) { ?>
            <button><a  style="text-decoration: none" href="tinhtrang.php?id=<?= $each['id_khach_hang'] ?>&tinh_trang=1">Cấp quyền </a></button>
            <?php } ?>
           </td>
           <?php } ?>
      </tr>
      <?php endforeach ?>
    </table>
    <?php } else { ?>

<p style="margin-left:50px; margin-top:50px; color:gray;">Không có kết quả tìm kiếm</p>
<br>
<hr>

<?php } ?>
    <br><br>
    <div class="page-btn">
    <?php for($i = 1; $i <= $Tong_so_trang ; $i++) { ?>
       <span><a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
          <?php echo $i ?>
          </a>
      </span>
       
        <?php } ?>
        
     </div>
 

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
  alert("Bạn xóa thành công!");
}
</script>   
</body>
</html>
<?php } ?>