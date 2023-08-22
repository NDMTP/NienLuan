<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
include "head.php";
include "connect.php"
?>

<body class="biolife-body">

    <!-- Preloader -->
    <!-- <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div> -->

    <!-- HEADER -->
    <?php
    include "header.php"
    ?>

<!--Hero Section-->
<div class="hero-section hero-background">
    </div>


    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <form action="thongtindonhang.php" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="signin-container">
                                <h2>Thông tin người nhận</h2>
                                <p class="form-row">
                                    <label for="fid-name">Tên:<span class="requite">*</span></label>
                                    <input required type="text" id="fid-name" name="hoten"
                                        value="<?php echo  $_SESSION["hoten"] ?>" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-sdt">Số điện thoại:<span class="requite">*</span></label>
                                    <input required type="text" id="fid-sdt" name="sdt" value="<?php echo $_SESSION["sdt"]?>"
                                        class="txt-input">
                                </p>
                                <p class="form-row">
                                    
                                    <label for="fid-quan">Quận:<span class="requite">*</span></label>
                                    <?php
                                        $kv = $_GET['area'];
                                        switch ($kv) {
                                            case 'NK':
                                                $tkv = 'Ninh Kiều';
                                                break;
                                            case 'BT':
                                                $tkv = 'Bình Thuỷ';
                                                break;
                                            case 'CR':
                                                $tkv = 'Cái Răng';
                                                break;
                                            default:
                                                $tkv = 'Cần Thơ';
                                                break;
                                        }
                                    ?>
                                    <input readonly type="text" id="fid-quan" name="quan"
                                        value="<?php echo $tkv ?>" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-phuong">Phường:<span class="requite">*</span></label>
                                    <select required style="border: 1px solid #e3e3e3 !important; padding: 10px; width: 100% !important; background-color:white;" name="phuong" id="fid_phuong">
                                        <option disabled selected value="">Chọn Phường</option>
                                        <?php
                                            $p = "select * from khuvuc where MAKHUVUC like '$kv%'";
                                            $result = $conn->query($p);
                                            if ($result->num_rows > 0) {
                                                $result = $conn->query($p);
                                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                foreach ($result_all as $row) {
                                                    echo '<option  style="width: 100% !important" value="'.$row['MAKHUVUC'].'">'.$row['TENKHUVUC'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p class="form-row">
                                    <label for="fid-note">Ghi chú:<span class="requite"></span></label>
                                    <input type="text" id="fid-note" name="note"
                                        value="" class="txt-input" placeholder="Số nhà, đường,...">
                                </p>
                                <div class="row" style="padding-bottom: 40px;">
                                    <div style="text-align: center;" class="col-12">
                                        <button type="submit" style="margin-top: 15px; padding: 10px 20px; background-color: #ff9702; color: white; border:none; border-radius: 15px;"><span style="font-size: 17px; font-weight: bold;">Xác nhận thông tin</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                    </div>
                </form>

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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/biolife.framework.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>