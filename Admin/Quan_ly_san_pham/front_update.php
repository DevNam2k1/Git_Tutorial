<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cập nhật sản phẩm</title>
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
    <h1>Sửa sản phẩm </h1>
    <p>Sửa chữa các sản phẩm.</p>
    </div>   
    <hr>
    <?php if(isset($_GET['error'])){ ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?> </p>
        <?php } ?>
    <?php 
  $thu_muc_anh = '../../File image/';
  $id = $_GET['id'];
  include '../../connect.php';
  mysqli_query($connect,'SET NAMES UTF8');
  $sql = "SELECT * FROM san_pham WHERE id = '$id'";
  $sql_danh_muc = "SELECT * FROM danh_muc";
  $result_danh_muc = mysqli_query($connect,$sql_danh_muc);
  $result = mysqli_query($connect,$sql);
  $each = mysqli_fetch_array($result);
 
?>
    <form enctype='multipart/form-data' action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
      <label>Tên sản phẩm</label>
      <input type="text" name="ten_san_pham" value="<?php echo $each['ten_san_pham'] ?>">

      <label>Giá</label>
      <input type="number" name="gia" value="<?php echo $each['gia'] ?>">
       
      <label>Số lượng</label>
      <input type="number" name="so_luong" value="<?php echo $each['so_luong'] ?>">

       <label>Ảnh cũ</label>
       <img id="img" width="150px" height="150px" src="<?php echo $thu_muc_anh . $each['file_anh'] ?>" >
       <input type="hidden" id="file" name="file_anh_old" value="<?php echo $each['file_anh'] ?>">

      <label>Hoặc thay ảnh sản phẩm mới</label>
      <input type="file" id="file" name="file_anh_new" >

      <label>Mô tả</label>
      <textarea name="mo_ta" cols="80" rows="10"> <?php echo $each['mo_ta'] ?></textarea>
        
      <label>Tên hãng</label>
      <input type="text" name="ten_hang" value="<?php echo $each['ten_hang'] ?>">

       <label>Đánh mục</label>
       <select name="ma_danh_muc">
       <option value="">Mặc Định</option>
           <?php foreach($result_danh_muc as $danh_muc): ?>
          <option value="<?php echo $danh_muc['id'] ?>"
          <?php if($danh_muc['id'] == $each['ma_danh_muc']) echo "selected"; ?>
          >
          <?php echo $danh_muc['ten_danh_muc'] ?>
          </option>
          <?php endforeach ?>
       </select>

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