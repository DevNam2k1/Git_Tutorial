<!----account page---->
<div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../File image/image1.png" width="100%">
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
                                <form action="../User/Common/process_login_user.php" id="LoginForm" method="POST">
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Mật khẩu" required>
                                    <button type="submit" name="login" class="btn">Đăng Nhập</button>
                                    <br><br>
                                    <p id="p">Bạn chưa là thành viên?</p>
                                    <a href="../User/regsiter.php" id="Dang_ki">Đăng Kí &nbsp &#8594;</a>
                                </form>
                               
                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
