<?php session_start(); 
if(empty($_SESSION['ten_khach_hang']) && $_SESSION['tinh_trang'] == 2 ){
  	
      header("location:login.php?error=Bạn chưa đăng nhập hoặc đăng kí");
    } else {
    ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nam Long | Quần áo số 1 Việt Nam</title>
        <link rel="stylesheet" href="../File CSS/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
    <?php
   include '../File PHP/top_header.php'; 
  ?>
   <?php 
     include '../File PHP/header_cart.php'; 
   ?>
    
    <?php 
        
        $thu_muc_anh = '../File image/';
        include '../connect.php';
        mysqli_query($connect,'SET NAMES UTF8');
        
        $GLOBALS['changed_cart'] = false;
        $error = false;
        $success = false;
     if (!isset($_SESSION["cart"])) {
          $_SESSION["cart"] = array();
      }
        
      if (isset($_GET['action'])) {

        function update_cart($connect,$add = false) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                } else {
                    if(!isset($_SESSION["cart"][$id])){
                        $_SESSION["cart"][$id] = 0;
                    }
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
      //Kiểm tra số lượng sản phẩm tồn kho
                        $addProduct = mysqli_query($connect, "SELECT `so_luong` FROM `san_pham` WHERE `id` = '$id'");
                        $addProduct = mysqli_fetch_assoc($addProduct);
                       
                        if ($_SESSION["cart"][$id] > $addProduct['so_luong']) {
    
                            $_SESSION["cart"][$id] = $addProduct['so_luong'];
                            $GLOBALS['changed_cart'] = true;
                        }
                }
            }
        }

          switch ($_GET['action']) {
              case "add":
                  update_cart($connect, true);
                  if ($GLOBALS['changed_cart'] == false) {
                    header('Location: cart.php');
                }
                break;
                  case "delete":
                    if (isset($_GET['id'])) {
                        unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('Location: cart.php');
                    break;
                   case "submit":
                    if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                        update_cart($connect);
                        header('Location: cart.php');
                    } elseif (isset($_POST['order_click'])) { //Đặt hàng sản phẩm

                        if (empty($_POST['ten_nguoi_nhan'])) {
                            $error = "Bạn chưa nhập tên của người nhận";
                        } elseif (empty($_POST['sdt_nguoi_nhan'])) {
                            $error = "Bạn chưa nhập số điện thoại người nhận";
                           
                        } elseif(!preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$_POST['sdt_nguoi_nhan'])){
                            $error = "Số điện thoại của bạn không đúng định dạng!";
                         } else
                            if (empty($_POST['dia_chi_nguoi_nhan'])) {
                            $error = "Bạn chưa nhập địa chỉ người nhận";
                            
                        } elseif (empty($_POST['quantity'])) {
                            $error = "Giỏ hàng rỗng";
                        }
                       
                        if ($error == false && !empty($_POST['quantity'])) { 
                            //Xử lý lưu giỏ hàng vào db
                            $products = mysqli_query($connect, "SELECT * FROM `san_pham` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ;
                            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ;
                            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ;
                            $ghi_chu = $_POST['ghi_chu'];
                            $ma_khach_hang = $_SESSION['id_khach_hang'];
                            $tinh_trang = 1; //đang chờ duyệt
                            $time = date("Y-m-d H:i:s");
                            $total = 0;
                            $orderProducts = array();
                            $updateString = "";
                            while ($row = mysqli_fetch_array($products)) {
                                $orderProducts[] = $row;
                                if ($_POST['quantity'][$row['id']] > $row['so_luong']) {
                                    $_POST['quantity'][$row['id']] = $row['so_luong'];
                                    $GLOBALS['changed_cart'] = true;
                                } else {
                                $total += $row['gia'] * $_POST['quantity'][$row['id']];
                                $updateString .= " when id = ".$row['id']." then so_luong - ".$_POST['quantity'][$row['id']];
                                }
                            }
                            if ($GLOBALS['changed_cart'] == false) {
                                $updateQuantity = mysqli_query($connect, "update `san_pham` set so_luong = CASE".$updateString." END where id in (".implode(",", array_keys($_POST['quantity'])).")");

                            $insertOrder = mysqli_query($connect, "INSERT INTO `hoa_don` ( `id_khach_hang`,`ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghi_chu`, `tong_gia`, `thoi_gian_dat_hang`,`tinh_trang`) 
                            VALUES ('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan','$ghi_chu','$total','$time','$tinh_trang');");

                            
                             $orderID = $connect->insert_id;
                            $insertString = "";
                            foreach ($orderProducts as $key => $product) {
                                $insertString .= "('" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['gia'] . "', '" . $time . "')";
                               
                                if ($key != count($orderProducts) - 1) {
                                    $insertString .= ",";
                                   
                                }
                            }
                            $insertOrder = mysqli_query($connect, "INSERT INTO `hd_chi_tiet` (`ma_hoa_don`, `ma_san_pham`, `so_luong`, `gia`, `thoi_gian_dat_hang`) VALUES " . $insertString . ";");
                        
                            $success = "Đặt hàng thành công";
                            unset($_SESSION['cart']);
                        }
                      
                      }  //đặt hàng thành công 
                    }
                    break;
          }
      }



      if (!empty($_SESSION["cart"])) {
          $result = mysqli_query($connect, "SELECT * FROM `san_pham` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
      }
        
     ?>   
    <div class="small-container cart-page">
    <div class="container">
            <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <p class="error"><?php echo $error ?>.<a href="javascript:history.back()">Quay lại</a></p> 
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                   <p class="sucess"><?php echo $success ?>. <a href="products.php">Tiếp tục mua hàng</a></p> 
                </div>
            <?php } else { ?>
                <h1>Giỏ hàng</h1>
                <?php if ($GLOBALS['changed_cart']) { ?>
                    <h3>Số lượng sản phẩm trong giỏ hàng đã thay đổi, do lượng sản phẩm tồn kho không đủ. Vui lòng <a href="cart.php">tải lại</a> giỏ hàng</h3>
                <?php } else { ?>
    <form id="cart-form" action="cart.php?action=submit" method="POST">
                <table>
                    <tr>
                        
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá(VNĐ)</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền(VNĐ)</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                    <?php 
                     if (!empty($result)) {
                    $tong = 0;
                    while ($each = mysqli_fetch_array($result)) {
                      ?>
                    <tr>
                        
                        <td><?php echo $each['ten_san_pham']?></td>
                        <td><img src="<?php echo  $thu_muc_anh.$each['file_anh']?>" /></td>
                        <td><?php echo (number_format($each['gia'],0, ",", ".")) ?></td>
                        <td><input type="text" value="<?php echo $_SESSION["cart"][$each['id']]?>" name="quantity[<?php echo $each['id']?>]" /></td>
                        <td>
                          <?php echo (number_format($_SESSION["cart"][$each['id']]*$each['gia'], 0, ",", "."))?>
                          <?php $tong += $_SESSION["cart"][$each['id']]*$each['gia'] ?>
                        </td>
                        <td><a href="cart.php?action=delete&id=<?php echo $each['id'] ?>">Xóa</a></td>
                    </tr>

                     <?php  } ?>
                    <tr id="row-total">
                        
                        <td>Tổng tiền</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo (number_format($tong, 0, ",", ".")." "."VNĐ") ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
                <div id="form-button">
                    <input type="submit" name="update_click" value="Cập nhật" />
                </div>
                 <?php
                 $id = $_SESSION['id_khach_hang'];
                 $sql_khach_hang = "SELECT * FROM khach_hang WHERE id_khach_hang = '$id'";
                 $result_khach_hang = mysqli_query($connect,$sql_khach_hang);
                 $each_khach_hang = mysqli_fetch_array($result_khach_hang);
                 ?>
                <hr>
                <div><label>Người nhận: </label><input type="text" value="<?php  echo $each_khach_hang['ten_khach_hang']; ?>" name="ten_nguoi_nhan" /></div>
                <div><label>Điện thoại: </label><input type="text" value="<?php echo $each_khach_hang['sdt_khach_hang'];  ?>" name="sdt_nguoi_nhan" /></div>
                <div><label>Địa chỉ: </label><input type="text" value="<?php  echo $each_khach_hang['dia_chi']; ?>" name="dia_chi_nguoi_nhan" /></div>
                <div><label>Ghi chú: <br> </label><textarea name="ghi_chu" cols="100" rows="10" ></textarea></div>
                <input type="submit" name="order_click" value="Đặt hàng" />
            </form>
    <?php } ?> 
    <?php } ?>
            </div>
</div>
<?php 
     include '../File PHP/footer.php'; 
   ?>
  <script src="../File JS/toggle_menu.js"></script>
</body>
</html>
<?php } ?>