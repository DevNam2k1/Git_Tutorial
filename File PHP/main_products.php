<div class="background1">
<!------ fetured categories ------->

<!------ Featured products ------->
  <div class="small-container">
    <div class="row row-2">
      <h2>Tất cả sản phẩm</h2>
      
      
    </div>
      
    <?php 
    
    $thu_muc_anh = '../File image/';
   
    include '../connect.php';
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
         WHERE ten_san_pham LIKE '%$tim_kiem%' or danh_muc.ten_danh_muc LIKE '%$tim_kiem%' 
         or danh_muc.id LIKE '%$tim_kiem%'and tinh_trang = 1 
         ;
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
        WHERE ten_san_pham LIKE '%$tim_kiem%' or danh_muc.ten_danh_muc LIKE '%$tim_kiem%'  or danh_muc.id LIKE '%$tim_kiem%' and tinh_trang = 1 
        LIMIT $So_sp_tren_1_trang
        OFFSET $So_sp_bo_qua
        ;
        ";
         $result = mysqli_query($connect,$sql);
        
    ?>
    <?php if(mysqli_num_rows($result) != 0){ ?>
      <div class="row">
   
      <?php foreach($result as $each): ?>
        <?php if($each['tinh_trang'] == 1) { ?>
          <div class="col-4">
              <a href="products_detail.php?id=<?php echo $each['id']?>&ma_danh_muc=<?php echo $each['ma_danh_muc'] ?>"><img src="<?php echo $thu_muc_anh . $each['file_anh'] ?>"></a>
              <h4><?php echo $each['ten_san_pham'] ?></h4>

              <p><?php echo (number_format($each['gia'],0, ",", ".")." "."VND") ?></p>
          </div>
          <?php } ?>
          <?php endforeach ?>

       
  </div>
  <?php } else { ?>

<p style="margin-left:50px; margin-top:50px; color:gray;">Không có kết quả tìm kiếm</p>
<br>
<hr>

<?php } ?>
    
  <div class="page-btn">
    <?php for($i = 1; $i <= $Tong_so_trang ; $i++) { ?>
       <span><a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
          <?php echo $i ?>
          </a>
      </span>
       
        <?php } ?>
        
     </div>
  </div>