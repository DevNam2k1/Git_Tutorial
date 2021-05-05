<div class="background1">
<!------ fetured categories ------->
<div class="categories">
    <div class="small-container">
    <div class="row">
        
         <div class="col-3">
             <img src="../File image/category-1.jpg" >
         </div>
         <div class="col-3">
               <img src="../File image/category-2.jpg">
         </div>
         <div class="col-3">
             <img src="../File image/category-3.jpg">
         </div>

        </div>
       
    </div>
</div>
<!------ Featured products ------->
<?php 
   $thu_muc_anh = '../File image/';
   include '../connect.php';
   mysqli_query($connect,'SET NAMES UTF8');
   $sql_sp_noi_bat = "SELECT * FROM san_pham LIMIT 4";
   $result_sp_noi_bat = mysqli_query($connect,$sql_sp_noi_bat);
   $sql_sp_moi_nhat = "SELECT * FROM san_pham 
    ORDER BY id DESC
    LIMIT 8;
   ";
   $result_sp_moi_nhat = mysqli_query($connect,$sql_sp_moi_nhat);

?>
  <div class="small-container">
      <h2 class="title">Sản phẩm nổi bật</h2>
      <div class="row">
      <?php foreach($result_sp_noi_bat as $sp_noi_bat): ?>
          <div class="col-4">
              <a href="../User/products_detail.php?id=<?php echo $sp_noi_bat['id']?>&ma_danh_muc=<?php echo $sp_noi_bat['ma_danh_muc'] ?>"><img src="<?php echo $thu_muc_anh . $sp_noi_bat['file_anh'] ?>"></a>
              <h4><?php echo $sp_noi_bat['ten_san_pham'] ?></h4>
              <p><?php echo (number_format($sp_noi_bat['gia'],0, ",", ".")." "."VNĐ") ?></p>
          </div>
          <?php endforeach ?>
   
      </div>  <h2 class="title">Sản phẩm mới nhất</h2>
      <div class="row">
      <?php foreach($result_sp_moi_nhat as $sp_moi_nhat): ?>
          <div class="col-4">
              <a href="../User/products_detail.php?id=<?php echo $sp_moi_nhat['id'] ?>&ma_danh_muc=<?php echo $sp_moi_nhat['ma_danh_muc'] ?>"><img src="<?php echo $thu_muc_anh . $sp_moi_nhat['file_anh'] ?>"></a>
              <h4><?php echo $sp_moi_nhat['ten_san_pham'] ?></h4>
              <p><?php echo (number_format($sp_moi_nhat['gia'],0, ",", ".")." "."VNĐ")?></p>
          </div>
          <?php endforeach ?>


  </div>

  </div>
  <!-----offer------>
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="../File image/exclusive.png" class="offer-img">
            </div>          
    
        <div class="col-2">
            <p>Sản phẩm độc quyền của Nam Long</p>
            <h1>Smart Band 4</h1>
            <small>
                We evaluated the watches’ 
                claimed water resistance, with one exception, 
                the Cookoo 2: It claimed water resistance to 
                100 meters or 300 feet, but we can 
                test only to 220 feet. Each of the other models met its water-resistance claims.<br>
            </small>
            <a href="#" class="btn">Mua Ngay &#8594;</a>
        </div>
        </div>
    </div>

</div>

<!-------- testimonial --------->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>I am waiting for second part of the video. I have learn a lot from this first one. About making my site responsive
                     to all users device. When soon kind sir ??</p>
                     <div class="rating"> 
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                      </div>
                      <img src="../File image/user-1.png" >
                      <h3>Sean Parker</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>I am waiting for second part of the video. I have learn a lot from this first one. About making my site responsive
                     to all users device. When soon kind sir ??</p>
                     <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                      </div>
                      <img src="../File image/user-2.png" >
                      <h3>Sean Parker</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>I am waiting for second part of the video. I have learn a lot from this first one. About making my site responsive
                     to all users device. When soon kind sir ??</p>
                     <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                      </div>
                      <img src="../File image/user-3.png" >
                      <h3>Sean Parker</h3>
            </div>
        </div>
    </div>
</div>

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="../File image/logo-godrej.png" >
            </div>
            <div class="col-5">
                <img src="../File image/logo-oppo.png" >
            </div>
            <div class="col-5">
                <img src="../File image/logo-coca-cola.png" >
            </div>
            <div class="col-5">
                <img src="../File image/logo-paypal.png" >
            </div>
            <div class="col-5">
                <img src="../File image/logo-philips.png" >
            </div>
        </div>
    </div>
</div>
