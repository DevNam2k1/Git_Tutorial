<?php 	

include '../../connect.php';
$ma = $_GET['id'];
$tinh_trang= $_GET['tinh_trang'];
 $sql = "UPDATE san_pham
 SET tinh_trang = '$tinh_trang' where id = '$ma' ";
 // die($sql);exit();
 mysqli_query($connect,$sql);
 header('location: index.php');

 ?>