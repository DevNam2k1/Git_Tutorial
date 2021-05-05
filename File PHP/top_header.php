
<div class="top_header">
<div class="left">
    <p>Hotline: 0398759260 </p>
</div>
<div class="right">
    <ul>
    	<?php if(empty($_SESSION['id_khach_hang']) && empty($_SESSION['ten_khach_hang'])){ ?>
        <li>
        	<a href="../User/login.php">Đăng nhập</a>
        </li>

         <li>
            <a href="../User/regsiter.php">Đăng kí</a>
         </li>
    <?php } else { ?>
    	<li>
    		<a href="../User/dashboard.php" title="">Xin chào <b><?php echo $_SESSION['ten_khach_hang'] ?></b></a>
    		&nbsp <a href="../User/Common/logout_user.php" title=""><i class="fa fa-power-off"></i></a>
    	</li>
    <?php } ?>
    </ul>
</div>
</div>
