<?php 
  
   $email = $_POST['email'];
   $password = $_POST['password'];
   include '../../connect.php';
  
   $sql = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password'";
   var_dump($sql);
   $result = mysqli_query($connect,$sql);
 
   //dem_ket_qua
   $dem_ket_qua = mysqli_num_rows($result);
   if($dem_ket_qua == 1){
   	  session_start();
       
   	  $each = mysqli_fetch_array($result);
      
      
      $userPrivileges = mysqli_query($connect, "SELECT * FROM `admin_privilege` INNER JOIN `privilege` 
       ON admin_privilege.privilege_id = privilege.id WHERE admin_privilege.admin_id = ".$each['id_admin']);
      $userPrivileges = mysqli_fetch_all($userPrivileges, MYSQLI_ASSOC);
      if(!empty($userPrivileges)){
        $each['privileges'] = array();
        foreach($userPrivileges as $privilege){
            $each['privileges'][] = $privilege['url_match'];
        }
    }
  
    $_SESSION['id_admin'] = $each['id_admin'] =  $each ;
    $_SESSION['name'] =    $each['name'];
   $_SESSION['level'] = $each['level'];
   	  
    header("location:dashboard.php");   

   }
  else
  {
      
    header("location:login_admin.php?error=Email hoặc mật khẩu sai!");
  }
 
?>