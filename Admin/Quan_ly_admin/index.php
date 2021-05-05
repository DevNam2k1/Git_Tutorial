
<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý admin</title>
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
        mysqli_query($connect,'SET NAMES UTF8');
        $tim_kiem = '';
     if(isset($_GET['tim_kiem'])){
          $tim_kiem = $_GET['tim_kiem'];
        }

        $sql = "SELECT 
         *
         FROM admin
         WHERE name LIKE '%$tim_kiem%' and level = '2' ;
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
        *
        FROM admin
        WHERE name LIKE '%$tim_kiem%' and level = '2'
        LIMIT $So_sp_tren_1_trang
        OFFSET $So_sp_bo_qua
        ;
        ";
         $result = mysqli_query($connect,$sql);
        
     ?>  
   
   

    <h1>Danh Sách Nhân Viên</h1>
    <p>Nơi quản lý các nhân viên của superadmin.</p>
    </div>   
    <hr>
    <div class="Tong_so_trang">
    <h4>Tổng số admin: <?php echo $Tong_so_sp ?></h4> 
     <h5>Tổng số trang: <?php echo $Tong_so_trang ?></h5>
     <form>
       <label>Tìm Kiếm Admin:</label><input type="search" name="tim_kiem" id="search" >
     </form>
    </div>
    <?php if(mysqli_num_rows($result) != 0){ ?>
    <table>
      <tr>
        <th>Họ và Tên</th>
        <th>Số Điện Thoại</th>
        <th>Email</th>
        <th>Ngày Sinh</th>
        <th width="150px">Địa Chỉ</th>
        <th>Giới Tính</th>
        <th>CMND</th>
        <th>Cấp Độ</th>
        <?php if (checkPrivilege('Quan_ly_admin/admin_privilege.php?id=0')) { ?>
        <th>Phân Quyền</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_admin/front_update.php?id_admin=0')) { ?>
        <th>Sửa</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_admin/front_delete.php?id_admin=0')) { ?>
        <th>Xoá</th>
        <?php } ?>
        
      </tr>
    
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['name'] ?>
           </td>
           <td>
           <?php echo $each['phone_number'] ?>
           </td>
           <td>
           <?php echo $each['email'] ?>
           </td>
           <td>
           <?php echo date_format(date_create($each['birthday']),'d-m-Y') ?>
           </td>
           <td>
           <?php echo $each['address'] ?>
           </td>
           <td>
           <?php
           if($each['gender'] == 1){
             echo "Nam";
           } else {
             echo "Nữ";
           }
           ?>
           </td>
           <td>
           <?php echo $each['cmnd'] ?>
           </td>
           <td>
           <?php  if($each['level'] == 1){
             echo "SuperAdmin";
           } else {
             echo "Admin";
           }  ?>
           </td>
           <?php if (checkPrivilege('Quan_ly_admin/admin_privilege.php?id='.$each['id_admin'])) { ?>
           <td>
            <a href="admin_privilege.php?id=<?php echo $each['id_admin'] ?>">Phân Quyền</a>
           </td>
           <?php } ?>
           <?php if (checkPrivilege('Quan_ly_admin/front_update.php?id_admin='.$each['id_admin'])) { ?>
           <td>
             <a href="front_update.php?id_admin=<?php echo $each['id_admin'] ?>" id="button">Sửa</a>
           </td>
           <?php } ?>
           <?php if (checkPrivilege('Quan_ly_admin/front_delete.php?id_admin='.$each['id_admin'])) { ?>
           <td>
             <a href="front_delete.php?id_admin=<?php echo $each['id_admin'] ?>" id="button" onclick="button()">Xóa</a>
           </td>
           <?php } ?>
      </tr>
      <?php endforeach ?>
    </table>
    
 <?php } else { ?>

 <p style="margin-left:50px; margin-top:50px; color:gray;">Không có kết quả tìm kiếm</p>
 <br>
 <hr>
<br><br>
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
  alert ("Bạn xoá thành công!");
}
</script> 
</body>
</html>
<?php } ?>