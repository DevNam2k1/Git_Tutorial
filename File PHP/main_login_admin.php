<!----account page---->
<div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../File image/image1.png" width="100%">
                        </div>
                        <div class="col-2">
                            <div class="form-container">
                                <div class="from-btn">
                                    <span onclick="login()">Đăng Nhập</span>
                                
                                    <hr>
                                </div>
                            
                                <?php if(isset($_GET['error'])){ ?>
                                    <p class="error"><?php echo $_GET['error']; ?> </p>
                                <?php } ?>
                                <?php if(isset($_GET['sucess'])){ ?>
                                    <p class="sucess"><?php echo $_GET['sucess']; ?> </p>
                                 <?php } ?>
                                <form action="../Common/process_login_admin.php" id="LoginForm" method="POST">
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Mật khẩu" required>
                                    <button  class="btn">Đăng Nhập</button>
                                </form>
                               
                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
