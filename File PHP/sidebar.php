           <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="../File image/plus.png" alt="">
                        <p>   <?php echo $_SESSION['ten_khach_hang'] ?></p>
                        <i class="fas fa-pencil-alt">Sửa Hồ Sơ</i>
                    </center>
                   

                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fa fa-user-circle"></i><span>Tài khoản Của Tôi<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../User/Common/front_update.php" target="iframe_a"><i class="fa fa-image"></i><span>Hồ Sơ </span></a>
                            <a href="../User/Common/change_pas.php" target="iframe_a"><i class="fa fa-lock"></i><span>Đổi Mật Khẩu</span></a>
                        </div>
                    </li>
                   
                    <li class="item" id="cart">
                        <a href="#cart"  class="menu-btn">
                            <i class="fa fa-shopping-cart"></i><span>Đơn hàng<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../User/Don_hang/index.php" target="iframe_a"><i class="fa fa-clipboard"></i><span>Danh Sách Đơn Hàng</span></a>
                            <a href="../User/Don_hang/cho_duyet.php"target="iframe_a"><i class="fa fa-circle"></i><span>Đơn chờ duyệt </span></a>
                            <a href="../User/Don_hang/duyet.php"target="iframe_a"><i class="fa fa-circle"></i><span>Đơn đã duyệt </span></a>
                            <a href="../User/Don_hang/huy.php"target="iframe_a"><i class="fa fa-circle"></i><span>Đơn hủy </span></a>
                        </div>
                    </li>
                   
                   
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                            <i class="fa fa-envelope"></i><span>Thông Báo<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"><i class="fa fa-circle"></i><span>Cập nhật Đơn Hàng </span></a>
                            <a href="#"><i class="fa fa-circle"></i><span>Khuyễn Mãi </span></a>
                            <a href="#"><i class="fa fa-circle"></i><span>Hoạt Động </span></a>
                        </div>
                    </li>
                    <li class="item" id="settings">
                        <a href="#settings" class="menu-btn">
                            <i class="fa fa-cog"></i><span>Cài Đặt <i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu"> 
                            <a href="#"><i class="fa fa-language"></i><span>Language</span></a>
                        </div>
                    </li>
                    <li class="item">
                        <a href="#" class="menu-btn">
                            <i class="fa fa-info-circle"></i><span>About</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
 