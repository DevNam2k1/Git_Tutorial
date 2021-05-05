
<!DOCTYPE html>
<html>
    <head>
        <title>Hoa đơn chi tiết</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
            #order-detail{
                width : 30%;
                height : 40%; 
                border: 3px solid black; 
                background-color:hsla(120,60%,70%,0.3);   
            }
            #order-detail h1,h3{
                text-align: center;
            }
            #order-detail label{
                margin-left:20px;
            }
        </style>
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_SESSION['name'])) {
            $id = $_GET['id'];
            include '../../connect.php';
            mysqli_query($connect,'SET NAMES UTF8');
            $sql = "SELECT 
            hoa_don.*, 
            hd_chi_tiet.*,
             san_pham.ten_san_pham  
            FROM (( hoa_don
            INNER JOIN hd_chi_tiet ON hoa_don.id = hd_chi_tiet.ma_hoa_don)
            INNER JOIN san_pham ON san_pham.id = hd_chi_tiet.ma_san_pham)
            WHERE hoa_don.id = '$id' ";
            
            $result = mysqli_query($connect,$sql);
            
        }
        ?>
        <div id="order-detail-wrapper">
            <div id="order-detail">
            <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                ?>
                <?php foreach ($result as $each) : ?>
                <h1>Chi tiết đơn hàng</h1>
                <label>Người nhận: </label><span> <?php echo $each['ten_nguoi_nhan'] ?></span><br/>
                <label>Điện thoại: </label><span><?php echo $each['sdt_nguoi_nhan'] ?> </span><br/>
                <label>Địa chỉ: </label><span> <?php echo $each['dia_chi_nguoi_nhan'] ?></span><br/>
                <hr/>
                
                <h3>Danh sách sản phẩm</h3>
                <ul>
                <?php foreach ($result as $each) : ?>
                        <li>
                            <span class="item-name"><?php echo $each['ten_san_pham'] ?></span>
                            <span class="item-quantity"> - SL: <?php echo $each['so_luong'] ?> sản phẩm</span>
                        </li>
                        
                        <?php
                        $totalMoney += ($each['gia'] * $each['so_luong']);
                        $totalQuantity += $each['so_luong'];
                    ?>
                    <?php endforeach ?>
                </ul>
                <?php endforeach ?>
                <hr/>
                <label>Tổng SL:</label> <?php echo $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ
                <p><label>Ghi chú: </label><?php echo $each['ghi_chu'] ?></p>
            </div>
        </div>
        
    </body>
</html>
