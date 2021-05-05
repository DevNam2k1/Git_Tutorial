
        <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                   <a href="index.php"><img src="../File image/logo.png" width="135px" ></a> 
                </div>
                <?php include 'search.php' ?>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="products.php">Sản phẩm</a>
                            <ul id="menu_2">
                            <?php
                           include '../connect.php';
                            $sql = "SELECT * FROM danh_muc ;";
                             $result = mysqli_query($connect,$sql);

                             ?>

                            <?php foreach($result as $each):  ?>
    
                            <li class="li"><a href="products.php?tim_kiem=<?php echo $each['ten_danh_muc'] ?>" style="text-decoration:none;"><?php echo $each['ten_danh_muc'] ?></a></li>

                             <?php endforeach ?>
                            </ul>
                        </li>
                        <li><a href="about_us.php">Giới Thiệu</a></li>
                        <li><a href="contant.php">Liên Hệ</a></li>
                 
                    </ul>
                </nav>
                <?php if(isset($_SESSION['ten_khach_hang'])){ ?>
               <a href="cart.php"> <img src="../File image/cart.png" width="30px" height="30px" style="position:relative;">
                 <?php if(isset($_SESSION['cart'])){ ?>
                   <?php  if( count($_SESSION['cart']) != 0 ){ ?>
                        <p style="width:15px;height:15px;border-radius:50%;background:red;color:white;text-align:center;position: absolute;top:23px;right:40px;">
                       <?php    echo count($_SESSION['cart']);  ?>
                           </p>
                 <?php } ?>
            <?php } ?>
               </a> 
               <?php } ?>
                <img src="../File image/menu.png" class="menu-icon" onclick="menutoggle()">

            </div>
            <div class="row">
                <div class="col-2">
                <h1>Một làn gió mới trong <br>cho phong cách <br> của bạn!</h1>
                <p>
                   Hãy thay đổi nhưng phong cách hiện nay của bạn <br>
                   bằng nhưng trang phục của chúng tôi để khiến bạn thoải <br>
                   trong việc tập luyện.
                </p>
                <a href="products.php" class="btn">Khám phá ngay &#8594;</a>
                </div>
                <div class="col-2">
                <img src="../File image/image1.png">
                </div>
            </div>
        </div>
    
     </div> 
