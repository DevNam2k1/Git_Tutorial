<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý hóa đơn</title>
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
        
        $thu_muc_anh = '../../File image/';
        include '../../connect.php';
        mysqli_query($connect,'SET NAMES UTF8');
        $tim_kiem = '';
        if(isset($_GET['tim_kiem'])){
          $tim_kiem = $_GET['tim_kiem'];
        }
        $sql = "SELECT 
         hoa_don.*,
         khach_hang.ten_khach_hang ,
         khach_hang.sdt_khach_hang,
         khach_hang.dia_chi
         FROM hoa_don 
         join khach_hang on khach_hang.id_khach_hang = hoa_don.id_khach_hang
         WHERE ten_nguoi_nhan LIKE '%$tim_kiem%' and tinh_trang = '3';
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
        $sql = "SELECT 
        hoa_don.*,
         khach_hang.ten_khach_hang ,
         khach_hang.sdt_khach_hang,
         khach_hang.dia_chi
         FROM hoa_don
        join khach_hang on khach_hang.id_khach_hang = hoa_don.id_khach_hang
        WHERE ten_nguoi_nhan LIKE '%$tim_kiem%' and tinh_trang = '3'
        ORDER BY id DESC
        LIMIT $So_sp_tren_1_trang
        OFFSET $So_sp_bo_qua
        ;
        ";

         $result = mysqli_query($connect,$sql);
    
     ?>  
    <h1>Danh sách hủy</h1>
    <p>Nơi quản lý hóa đơn đã hủy.</p>
    </div>   
    <hr>
    <div class="Tong_so_trang">
    <h4>Tổng số hóa đơn: <?php echo $Tong_so_sp ?></h4> 
     <h5>Tổng số trang: <?php echo $Tong_so_trang ?></h5>
     <form>
       <label>Tìm Kiếm Hóa Đơn:</label><input type="search" name="tim_kiem" id="search" >
     </form>
    </div>
    
    <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?> </p>
        <?php } ?>
    
    <table>
    
      <tr>
        <th>Tên người nhận</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Thông tin người đặt</th>
        <th>Xem đơn</th>
        <th>In đơn</th>
        <th>Ngày tạo</th>
        <th>Tình trạng</th>
        
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['ten_nguoi_nhan'] ?>
           </td>
           <td>
           <?php echo $each['dia_chi_nguoi_nhan'] ?>
           </td>
           <td>
           <?php echo $each['sdt_nguoi_nhan'] ?>
           </td>
           <td>
             
               Tên: <?php echo $each['ten_khach_hang'] ?><br>
               SĐT: <?php echo $each['sdt_khach_hang'] ?><br>
               Địa Chỉ: <?php echo $each['dia_chi'] ?><br>
             
           </td>

           <td>
             <a href="show_cart.php?id=<?php echo $each['id'] ?>"style="color:gray;" >Xem</a>
           </td>
           <td>
           <a href="print_cart.php?id=<?php echo $each['id']?>" target="_blank"style="color:gray;">In</a></td>

           <td>
           <?php echo date_format(date_create($each['thoi_gian_dat_hang']),'d-m-Y') ?>
           </td>
           <td>
           <?php if($each['tinh_trang'] == 1){ ?>
              <span style="color:gray;">Đang chờ duyệt</span>
             <?php  } else if($each['tinh_trang'] == 2){ ?>
              <span style="  color:  #02531dbd;">Đã duyệt</span>
           <?php } else{ ?>
            <span style="color:red;">Đã hủy</span>
        <?php    }
           ?>
           </td>
           
      </tr>
      <?php endforeach ?>
    </table>
    <br><br><br>
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

 
</body>
</html>

  
<?php } ?>
