   <!---------single product details----------->

   <div class="small-container single-product">
        <div class="row">
            <?php 
               $id = $_GET['id'];
               $thu_muc_anh = '../File image/';
               include '../connect.php';
               mysqli_query($connect,'SET NAMES UTF8');
               $sql = "SELECT * FROM san_pham WHERE id = '$id'";
               $result = mysqli_query($connect,$sql);
               $each = mysqli_fetch_array($result);
            ?>
            
            <?php foreach($result as $each): ?>
            <div class="col-2">
                <img src="<?php echo $thu_muc_anh . $each['file_anh'] ?>" width="100%" id="product-img">
                <!-- <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="../images/gallery-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../images/gallery-2.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../images/gallery-3.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="../images/gallery-4.jpg" width="100%" class="small-img">
                    </div>
                </div> -->
        
         <?php endforeach ?>
         
         
            </div>
            <?php foreach($result as $each): ?>
                <div class="col-2">
                
                    <p>Home / T-Shirt</p>
                    <h1><?php echo $each['ten_san_pham'] ?></h1>
                    <h4><?php echo (number_format($each['gia'],0, ",", ".")." "."VNĐ")?></h4>
                    <div class="product-quantity"><label>Tồn kho: </label><strong><?= $each['so_luong'] ?></strong></div>
                    <!-- <select>
                        <option>Select Size</option>
                        <option>XXL</option>
                        <option>XL</option>
                        <option>Large</option> 
                        <option>Medium</option>  
                        <option>Small</option>                      
                    </select> -->
                    <br>
                    <?php if($each['so_luong'] > 0) { ?>
                     <form action="cart.php?action=add" method="POST">
                     <input type="number" value="1" min="0" max="99" style="width:60px;" name="quantity[<?php echo $each['id'] ?>]">
                    
                    <?php if(!empty($_SESSION['id_khach_hang']) && !empty($_SESSION['ten_khach_hang'])){ ?>
                         <button type="submit" class="btn" >Thêm vào giỏ</button>
                     <?php } else {?>

                        <div class="error" style="margin-top: 10px;">
                            Đăng kí hoặc đăng nhập trước khi mua hàng!
                        </div>
                        <?php } ?>
                     <?php } else { ?>
                        <span class="error" style="margin-top: 10px;">Hết hàng</span>
                        <br>
                    <?php } ?>
                     </form>
                    
                     <br>
                    <h3>Mô Tả Sản Phẩm <i class="fa fa-indent"></i> </h3>
                      <br>
                    <p>
                        <?php echo $each['mo_ta'] ?>
                    </p>
                

            </div>
            <?php endforeach ?>
        </div>
    </div>
   

<!------------title----------->
<div class="small-container">
<!-- comment -->
<br><br><br>
<h3 style="color:gray;">Bình Luận Sản Phẩm:</h3>
<div class="comment">
<?php if(!empty($_SESSION['id_khach_hang']) && !empty($_SESSION['ten_khach_hang'])){ ?>
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Nhập Tên" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Nhập Bình Luận" rows="5" style="margin: 0px; width: 1031px; height: 87px;"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="hidden" name="product_id" id="product_id" value="<?php echo $id ?>" />
     <input type="submit" name="submit" id="submit"  value="Bình luận" />
    </div>
   </form>
   <?php } else { ?>

<div class="error" style="margin-top: 10px;">
Đăng kí hoặc đăng nhập trước khi trả lời hoặc comment!
</div>
    <?php } ?>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
<!-- end comment -->

    <div class="row row-2">
        <h2>Sản Phẩm Liên Quan</h2>
        <p>View More</p>
    </div>
</div>
<div class="background1">

<?php 
   $id_danh_muc = $_GET['ma_danh_muc'];
   $thu_muc_anh = '../File image/';
   include '../connect.php';
   mysqli_query($connect,'SET NAMES UTF8');
   $sql_sp_noi_bat = "SELECT * FROM san_pham  WHERE ma_danh_muc = '$id_danh_muc' and id != '$id' LIMIT 4";
   $result_sp_noi_bat = mysqli_query($connect,$sql_sp_noi_bat);
?>
  <div class="small-container">
    
       <div class="row">
       <?php foreach($result_sp_noi_bat as $sp_noi_bat): ?>
          <div class="col-4">
              <a href="../User/products_detail.php?id=<?php echo $sp_noi_bat['id'] ?>&ma_danh_muc=<?php echo $each['ma_danh_muc'] ?>"><img src="<?php echo $thu_muc_anh . $sp_noi_bat['file_anh'] ?>"></a>
              <h4><?php echo $sp_noi_bat['ten_san_pham'] ?></h4>

              <p><?php echo (number_format($sp_noi_bat['gia'],0, ",", ".")." "."VNĐ") ?></p>
          </div>
          <?php endforeach ?>
    
    </div>
  
    
    
  </div>