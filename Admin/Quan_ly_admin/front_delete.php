<?php 

  $id = $_GET['id_admin'];
 

  include '../../connect.php';

  $sql ="DELETE FROM admin  
  WHERE
  id_admin = '$id'
  ";

  mysqli_query($connect,$sql);
  mysqli_close($connect);

  header('location:index.php');
?>