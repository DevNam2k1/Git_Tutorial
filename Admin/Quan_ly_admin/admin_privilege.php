<?php session_start();
   if(empty($_SESSION['id_admin']) || empty($_SESSION['name'])){
    echo "Không có quyền truy cập vào !";
   } else {

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý admin</title>
        <link rel="stylesheet" href="../../File CSS/dashboard_admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <style>
            *{
           padding: 0;
            margin: 0;
            }
          .header2{
          width: 100%;
          height: 630px;
 
               }
            .top{
                margin-left: 50px;
                margin-top: 20px;
            }
            h1{
                font-size: 30px;
            }
            hr{
             width: 80%;

            }
            .my_profile form{
    margin-left: 50px;
    margin-top: 30px;
    

}
    .privilege-group{
    margin-bottom: 50px;
}
.group-name{
    margin: 0;
    padding-bottom: 5px;
}
.privilege-group ul{
    margin: 0;
    padding: 0;
}
.privilege-group ul li{
    float: left;
    width: 20%;
    list-style: none;
}
#editing-form .privilege-group ul li input{
    float: none;
}
#editing-form .privilege-group ul li label{
    float: none;
    width: auto;
}
.btn{
    display: inline-block;
    background: #ff523b;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 280px;
}
.btn:hover{
    background: rgba(39, 17, 2, 0.747);
    transition: 0.5s;
}

        </style>
    </head>
    <body>


<?php
   include '../Common/sidebar_admin.php'; 
?>


 <!--main container start-->
 <div class="main-container">
    
    <div class="header2">
    <div class="my_profile">
    <div class="top">
   <?php if (!empty($_SESSION['id_admin'])) { ?>
    <h1>Phần Quyền Nhân Viên</h1>
    <p>Nơi phần quyền cho các nhân viên.</p>
    </div>   
    <hr>
    <?php
            if (!empty($_GET['action']) && $_GET['action'] == "save"
            ) {
                $data = $_POST;
                $insertString = "";
                include '../../connect.php';
                mysqli_query($connect,'SET NAMES UTF8');
                $deleteOldPrivileges = mysqli_query($connect, "DELETE FROM `admin_privilege` WHERE `admin_id` = ".$data['admin_id']);
                foreach ($data['privileges'] as $insertPrivilege) {
                    $insertString .= !empty($insertString) ? "," : "";
                    $insertString .= "(NULL, " . $data['admin_id'] . ", " . $insertPrivilege . ", '1595430953', '1595430953')";
                }
                $insertPrivilege = mysqli_query($connect, "INSERT INTO `admin_privilege` (`id`, `admin_id`, `privilege_id`, `created_time`, `last_updated`) VALUES " . $insertString);
                
                if($insertPrivilege == false){
                    $error = "Phân quyền không thành công. Xin thử lại";
                }
                ?>
                <?php  if(!empty($error)){ echo $error;?>
                    
                <?php } else { ?>
                    Phân quyền thành công. <a href="index.php">Quay lại danh sách thành viên</a>
                <?php } ?>
                <?php } else { ?>
                <?php
                $privileges = mysqli_query($connect, "SELECT * FROM `privilege`");
                $privileges = mysqli_fetch_all($privileges, MYSQLI_ASSOC);
                
                $privilegeGroup = mysqli_query($connect, "SELECT * FROM `privilege_group` ORDER BY `privilege_group`.`position` DESC");
                $privilegeGroup = mysqli_fetch_all($privilegeGroup, MYSQLI_ASSOC);
                
                $currentPrivileges = mysqli_query($connect, "SELECT * FROM `admin_privilege` WHERE `admin_id` = ".$_GET['id']);
                $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                $currentPrivilegeList = array();
                if(!empty($currentPrivileges)){
                    foreach($currentPrivileges as $currentPrivilege){
                        $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                    }
                }
                ?>
     <form id="editing-form" method="POST" action="?action=save" enctype="multipart/form-data">
                   
                    <input type="hidden" name="admin_id" value="<?= $_GET['id'] ?>" />
                    <div class="clear-both"></div>
                    <?php foreach ($privilegeGroup as $group) { ?>
                        <div class="privilege-group">
                            <h3 class="group-name"><?= $group['name'] ?></h3>
                            <ul>
                                <?php foreach ($privileges as $privilege) { ?>
                                    <?php if ($privilege['group_id'] == $group['id']) { ?>
                                        <li>
                                            <input type="checkbox"
                                                <?php if(in_array($privilege['id'], $currentPrivilegeList)){ ?> 
                                                checked=""    
                                                <?php } ?>
                                                value="<?= $privilege['id'] ?>" id="privilege_<?= $privilege['id'] ?>" name="privileges[]" />
                                            <label for="privilege_<?= $privilege['id'] ?>"><?= $privilege['name'] ?></label>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                                <div class="clear-both"></div>
                            </ul>
                        </div>
                    <?php } ?>
                    <input type="submit" title="Lưu thành viên" class="btn" value="Lưu " />
                </form>
 
<?php } ?>
<?php } ?>
    </div>
    </div>
  </div>
            <!--main container end-->

   <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>

  
</script> 
</body>
</html>
<?php } ?>