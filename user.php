<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
include "head.php";
include "connect.php"
?>

<body class="biolife-body" style="margin-top: 300px;">

    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <?php
    include "header.php"
    ?>




    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">



                    <!--Form Thông tin tài khoản-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <h2>Thông tin cá nhân</h2>
                            <form action="updateuser.php" name="frm-login" method="post">

                                <p class="form-row">
                                    <label for="fid-name">Email:<?php echo $_SESSION["email"]?>
                                </p></label>
                                <p class="form-row">
                                    <label for="fid-name">Tên:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="hoten"
                                        value="<?php echo  $_SESSION["hoten"] ?>" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Số điện thoại:<span class="requite">*</span></label>
                                    <input type="text" id="fid-sdt" name="sdt" value="<?php echo $_SESSION["sdt"]?>"
                                        class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Địa chỉ:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="diachi"
                                        value="<?php echo $_SESSION["diachi"]?>" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="sb">Lưu thông
                                        tin</button>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Form -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <h2>&emsp;</h2>
                            <form action="dangnhap.php" name="frm-login" method="post">


                            </form>


                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>
    <?php
    include"footer.php"
    ?>
    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/biolife.framework.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>