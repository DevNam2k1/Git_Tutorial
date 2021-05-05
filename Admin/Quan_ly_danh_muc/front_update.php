<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cập nhật danh mục</title>
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
    <h1>Sửa danh mục </h1>
    <p>Sửa chữa các danh mục.</p>
    </div>   
    <hr>
    <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?> </p>
        <?php } ?>
    <?php 

  $id = $_GET['id'];
  include '../../connect.php';
  mysqli_query($connect,'SET NAMES UTF8');
  $sql = "SELECT * FROM danh_muc WHERE id = '$id'";
  $result = mysqli_query($connect,$sql);
  $each = mysqli_fetch_array($result);
 
?>
    <form enctype='multipart/form-data' action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
      <label>Tên danh mục</label>
      <input type="text" name="ten_danh_muc" value="<?php echo $each['ten_danh_muc'] ?>">

      

      <br>
      <button type="submit" class="btn" onclick="button()" name="submit">Sửa</button>
    </form>
    
 
 
    <script>
function button(){
  alert ("Bạn sửa thành công!");
}
</script>   

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