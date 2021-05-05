<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="vn" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý Danh Mục</title>
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
   
           $sql = "SELECT * FROM danh_muc ;
            ";
     
           $result = mysqli_query($connect,$sql);
   
     ?>
    <h1>Danh Sách Danh Mục</h1>
    <p>Nơi quản lý các khách hàng .</p>
    </div>   
    <hr>

    <table>
      <tr>
        <th width="50px">ID</th>
        <th>Tên Danh Mục</th>
        <?php if (checkPrivilege('Quan_ly_danh_muc/front_update.php?id=0')) { ?>
        <th>Sửa</th>
        <?php } ?>
        <?php if (checkPrivilege('Quan_ly_danh_muc/front_delete.php?id=0')) { ?>
        <th>Xóa</th>
        <?php } ?>
        
      </tr>
      <?php foreach($result as $each): ?>
      <tr>
           <td>
           <?php echo $each['id'] ?>
           </td>
           <td>
           <?php echo $each['ten_danh_muc'] ?>
           </td>
           <?php if (checkPrivilege('Quan_ly_danh_muc/front_update.php?id='.$each['id'])) { ?>
           <td> <a href="front_update.php?id=<?php echo $each['id'] ?>" id="button" >Sửa</a></td>
           <?php } ?>
           <?php if (checkPrivilege('Quan_ly_danh_muc/front_delete.php?id='.$each['id'])) { ?>
           <td>
             <a href="front_delete.php?id=<?php echo $each['id'] ?>" id="button" onclick="button()">Xóa</a>
           </td>
           <?php } ?> 
      
      </tr>
      <?php endforeach ?>
    </table>
    

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