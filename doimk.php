<?php
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("head.php");

?>

<?php
include("header.php");
?>



<body>

    <!-- Topbar End -->


    <!-- Navbar Start -->


    <div id="main-content" class="main-content" style="margin-top: 300px;">
            <div class="container">

                <div class="row">

                    <!--Form Đăng nhập-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <h2>Đổi mật khẩu</h2>
                            <form action="updatemk.php" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Mật khẩu mới:<span class="requite">*</span></label>
                                    <input type="password" id="matkhau" name="psw" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Mật khẩu nhập lại:<span class="requite">*</span></label>
                                    <input type="password" id="matkhau" name="psw1" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Mật khẩu cũ:<span class="requite">*</span></label>
                                    <input type="password" id="matkhau" name="psw2" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="sbpsw">Lưu</button>
                                    
                                </p>
                            </form>
                            
                            
                        </div>
                    </div>
                    <!--Form Đăng kí-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    </div>


                </div>

            </div>

        </div>

    <!-- Navbar End -->


    <!-- Footer Start -->
    <?php
    include("footer.php")
    ?>
</body>

</html>