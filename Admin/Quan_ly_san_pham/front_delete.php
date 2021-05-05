<?php 

  $id = $_GET['id'];
 

  include '../../connect.php';

  $sql ="DELETE FROM san_pham  
  WHERE
  id = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
?>