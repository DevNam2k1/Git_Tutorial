<?php 
   session_start();
   unset($_SESSION['id_khach_hang']);
   unset($_SESSION['ten_khach_hang']);


   header('location: ../login.php')
?>