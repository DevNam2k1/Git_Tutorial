<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý sản phẩm</title>
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
         san_pham.*,
         danh_muc.ten_danh_muc
         FROM (san_pham
         inner join danh_muc on san_pham.ma_danh_muc = danh_muc.id)
         WHERE ten_san_pham LIKE '%$tim_kiem%' or danh_muc.ten_danh_muc LIKE '%$tim_kiem%';
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
        san_pham.*,
        danh_muc.ten_danh_muc
        FROM (san_pham
        inner join danh_muc on san_pham.ma_danh_muc = danh_muc.id)
        WHERE ten_san_pham LIKE '%$tim_kiem%' or danh_muc.ten_danh_muc LIKE '%$tim_kiem%'
        ORDER BY id DESC
        LIMIT $So_sp_tren_1_trang
        OFFSET $So_sp_bo_qua
        ;
        ";
      
         $result = mysqli_query($connect,$sql);
        
     ?>  
    <h1>Danh sách sản phẩm</h1>
    <p>Nơi quản lý sản phẩm.</p>
    </div>   
    <hr>
    <div class="Tong_so_trang">
    <h4>Tổng số sản phẩm: <?php echo $Tong_so_sp ?></h4> 
     <h5>Tổng số trang: <?php echo $Tong_so_trang ?></h5>
     <form>
       <label>Tìm Kiếm Sản Phẩm:</label><input type="search" name="tim_kiem" id="search" >
     </form>
    </div>
    
    <?php if(mysqli_num_rows($result) != 0){ ?>
    
    <table>
    
      <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th style="width:200px;">Mô tả</th>
        <th>Ảnh sản phẩm</th>
        <th>Tên hãng</th>
        <th>Danh mục</th>
        <?php if (checkPrivilege('Quan_ly_san_pham/front_update.php?id=0')) { ?>
        <th>Sửa</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_san_pham/front_delete.php?id=0')) { ?>
        <th>Xoá</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_san_pham/tinhtrang.php?id=0&tinh_trang=0')) { ?>
        <th>TT</th>
        <?php } ?>
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['id'] ?>
           </td>
           <td>
           <?php echo $each['ten_san_pham'] ?>
           </td>
           <td>
           <?php echo $each['gia'] ?>
           </td>
           <td>
           <?php echo $each['so_luong'] ?>
           </td>
           <td style="width:200px;">
           <?php echo $each['mo_ta'] ?>
           </td>
           <td>
           <img width="100px" height="100px" src="<?php echo $thu_muc_anh . $each['file_anh'] ?>" >
           </td>
           <td>
           <?php echo $each['ten_hang'] ?>
           </td>
           <td>
           <?php echo $each['ten_danh_muc'] ?>
           </td>
           <?php if (checkPrivilege('Quan_ly_san_pham/front_update.php?id=0')) { ?>
           <td>
             <a href="front_update.php?id=<?php echo $each['id'] ?>" id="button">Sửa</a>
           </td>
           <?php } ?>
           <?php if (checkPrivilege('Quan_ly_san_pham/front_delete.php?id=0')) { ?>
           <td>
             <a href="front_delete.php?id=<?php echo $each['id'] ?>" id="button" onclick="button()">Xóa</a>
           </td>
            <?php } ?>
            <?php if (checkPrivilege('Quan_ly_san_pham/tinhtrang.php?id=0&tinh_trang=0')) { ?>
           <td>
            <?php if ($each['tinh_trang'] == 1) { ?>
              <button><a style="text-decoration: none" href="tinhtrang.php?id=<?= $each['id'] ?>&tinh_trang=2">Ẩn </a></button>
             <?php } else if ($each['tinh_trang'] == 2) { ?>
            <button><a  style="text-decoration: none" href="tinhtrang.php?id=<?= $each['id'] ?>&tinh_trang=1">Hiện </a></button>
            <?php } ?>
           </td>
           <?php } ?>
      </tr>
      <?php endforeach ?>
    </table>
    </table>
    
    <?php } else { ?>
   
    <p style="margin-left:50px; margin-top:50px; color:gray;">Không có kết quả tìm kiếm</p>
    <br>
    <hr>
   
    <?php } ?>
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



   
    <script>
function button(){
  alert ("Bạn xóa thành công!");
}
</script>   
</body>
</html>
<?php } ?>