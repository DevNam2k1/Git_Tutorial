<?php 	

include '../../connect.php';
$ma = $_GET['id'];
$tinh_trang= $_GET['tinh_trang'];
 $sql = "UPDATE khach_hang
 SET tinh_trang_khach_hang = '$tinh_trang' where id_khach_hang = '$ma' ";
 // die($sql);exit();
 mysqli_query($connect,$sql);
 header('location: index.php');

 ?>