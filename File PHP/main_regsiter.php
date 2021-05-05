<div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../File image/image1.png" width="100%">
                        </div>
                        <div class="col-2">
                            <div class="form-container">
                                <div class="from-btn">
                                    <span onclick="register()">Đăng Kí</span>
                                    <hr>
                                </div>
                                  <?php if(isset($_GET['error'])){ ?>
                                    <p class="error"><?php echo $_GET['error']; ?> </p>
                                 <?php } ?>
                                <form action="../User/Common/process_regsiter.php" id="RegForm" method="POST" id="form-1">
                                    <input type="text" id="fullname" name="ten_khach_hang" placeholder="Họ và Tên" required>
                                    <input type="email" id="email" name="email" placeholder="Email" required>
                                    <input type="password" id="password" name="password_1" placeholder="Mật khẩu" required>
                                    <input type="password" id="password_confirmation" name="password_2" placeholder="Nhập lại mật khẩu" required>
                                    <input type="hidden" name="tinh_trang" value="1">
                                    <button type="submit" name="regsiter" class="btn">Đăng Kí</button>
                                    <br><br>
                                    <p id="p">Bạn đã là thành viên?</p>
                                    <a href="../User/login.php" id="Dang_nhap">Đăng Nhập &nbsp &#8594;</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
