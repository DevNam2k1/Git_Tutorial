<?php 

  $id = $_GET['id'];
 

 include '../../connect.php';

  $sql ="DELETE FROM khach_hang  
  WHERE
  id_khach_hang = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
?>