<?php 

  $id = $_GET['id'];
 

  include '../../connect.php';

  $sql ="DELETE FROM danh_muc
  WHERE
  id = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
?>