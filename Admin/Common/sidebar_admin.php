<?php 

  include '../../connect.php';
  include '../../function.php';
//   $regexResult = checkPrivilege(); //Kiểm tra quyền thành viên
//   if (!$regexResult) {
//     echo "Bạn không có quyền truy cập chức năng này";
//     exit;
// }

  $sql = "SELECT * FROM hoa_don WHERE tinh_trang = '1'";
  $result = mysqli_query($connect,$sql);
  $each = mysqli_num_rows($result);
 
 
?>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div><img src="../../File image/logo.png" width="160px"  style="margin-left:20px;"></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul>
                        <li><a href="../Quan_ly_thong_bao/messages.php"><i class="fas fa-bell"><p style="width:15px;height:15px;border-radius:50%;background:red;color:white;text-align:center;position: absolute;top:15px;right:85px; ">
                       <?php    echo $each  ?>
                           </p></i></a></li>
                        <li><a href="../Common/logout_admin.php"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="../../File image/plus.png" alt="">
                        <br>
                        <?php echo $_SESSION['name'] ?><br>
                        <i class="fas fa-pencil-alt">Sửa Hồ Sơ</i>
                    </center>
                    <?php if (checkPrivilege('dashboard.php')) { ?>
                    <li class="item">
                        <a href="../Common/dashboard.php" class="menu-btn">
                            <i class="fa fa-desktop"></i><span>Bảng Điều Khiển</span>
                        </a>
                    </li>
                     <?php } ?>
                     <?php if (checkPrivilege('#profile')) { ?>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fa fa-user-circle"></i><span>Tài hoản Của Tôi<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                        <?php if (checkPrivilege('Common/profile.php')) { ?>
                            <a href="../Common/profile.php" target="_self"><i class="fa fa-image"></i><span>Hồ Sơ </span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Common/change_pas.php')) { ?>
                            <a href="../Common/change_pas.php" target="_self"><i class="fa fa-lock"></i><span>Đổi Mật Khẩu</span></a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if (checkPrivilege('#admin_management')) { ?>
                    <li class="item" id="admin_management">
                        <a href="#admin_management"   class="menu-btn">
                        <i class="fas fa-users-cog"></i><span>Quản lý admin <i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                        <?php if (checkPrivilege('Quan_ly_admin/index.php')) { ?>
                            <a href="../Quan_ly_admin/index.php"><i class="fas fa-users-cog"></i><span>Danh sách admin</span></a>
                        <?php } ?>
                        <?php if (checkPrivilege('Quan_ly_admin/front_insert.php')) { ?>
                            <a href="../Quan_ly_admin/front_insert.php"><i class="fa fa-user-plus"></i><span>Thêm admin </span></a>
                        <?php } ?>
                        </div>
                    </li>
                    
                    <?php } ?>
                    
                    <?php if (checkPrivilege('Quan_ly_khach_hang/index.php')) { ?>
                    <li class="item" id="customer_management">
                        <a href="../Quan_ly_khach_hang/index.php" target="_self"  class="menu-btn">
                            <i class="fa fa-users"></i><span>Quản lý khách hàng </span>
                        </a>

                    </li>
                    <?php } ?>
                    <?php if (checkPrivilege('#list_management')) { ?>
                    <li class="item" id="list_management">
                        <a href="#list_management"   class="menu-btn">
                        <i class="fa fa-clipboard"></i><span>Quản lý danh mục <i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                        <?php if (checkPrivilege('Quan_ly_danh_muc/index.php')) { ?>
                            <a href="../Quan_ly_danh_muc/index.php" target="_self"><i class="fa fa-clipboard"></i><span>Danh sách danh mục</span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Quan_ly_danh_muc/front_insert.php')) { ?>
                            <a href="../Quan_ly_danh_muc/front_insert.php" target="_self"><i class="fa fa-user-plus"></i><span>Thêm danh mục </span></a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>

                    <?php if (checkPrivilege('#product_management')) { ?>
                    <li class="item" id="product_management">
                        <a href="#product_management"   class="menu-btn">
                        <i class="fas fa-tshirt"></i><span>Quản lý sản phẩm <i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                        <?php if (checkPrivilege('Quan_ly_san_pham/index.php')) { ?>
                            <a href="../Quan_ly_san_pham/index.php" target="_self"><i class="fa fa-clipboard"></i><span>Danh sách sản phẩm</span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Quan_ly_san_pham/front_insert.php')) { ?>
                            <a href="../Quan_ly_san_pham/front_insert.php" target="_self"><i class="fa fa-user-plus"></i><span>Thêm sản phẩm </span></a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                        
                    <?php if (checkPrivilege('#cart_management')) { ?>
                    <li class="item" id="cart_management">
                    <a href="#cart_management" class="menu-btn">
                    <i class="fas fa-file-invoice"></i><span>Quản lý hóa đơn<i class="fa fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                        <?php if (checkPrivilege('Quan_ly_hoa_don/index.php')) { ?>
                            <a href="../Quan_ly_hoa_don/index.php" target="_self"><i class="fa fa-clipboard"></i><span>Danh Sách Hóa Đơn</span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Quan_ly_hoa_don/cho_duyet.php')) { ?>
                            <a href="../Quan_ly_hoa_don/cho_duyet.php"><i class="fa fa-circle"></i><span>Đơn chờ duyệt </span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Quan_ly_hoa_don/duyet.php')) { ?>
                            <a href="../Quan_ly_hoa_don/duyet.php"><i class="fa fa-circle"></i><span>Đơn đã duyệt </span></a>
                            <?php } ?>
                            <?php if (checkPrivilege('Quan_ly_hoa_don/huy.php')) { ?>
                            <a href="../Quan_ly_hoa_don/huy.php"><i class="fa fa-circle"></i><span>Đơn hủy </span></a>
                            <?php } ?>
                        </div>
                       
                    </li>
                    <?php } ?>
                      
                    <li class="item" id="messages">
                        <a href="../Quan_ly_thong_bao/messages.php" class="menu-btn">
                            <i class="fa fa-envelope"></i><span>Thông Báo<p style="width:15px;height:15px;border-radius:50%;background:red;color:white;text-align:center;position: absolute;top:26px;right:40px;">
                       <?php    echo $each  ?>
                           </p></span>
                        </a>
                        
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