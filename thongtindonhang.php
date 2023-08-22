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
                <form action="dathang.php" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <?php
                                $query = "SELECT * FROM khuvuc where MAKHUVUC = '{$_GET['phuong']}'";
                                $result = $conn->query($query);
                                $row = $result->fetch_assoc();
                                ?>
                            <div class="signin-container">
                                <h2>Thông tin đơn hàng</h2>                            
                                Khách hàng: <span style="font-size: 17px; font-weight: bold;"><?php echo $_GET['hoten'] ?></span><br>
                                SDT: <span style="font-size: 17px; font-weight: bold;"><?php echo $_GET['sdt'] ?></span><br>
                                Địa chỉ: <span style="font-size: 17px; font-weight: bold;"><?php echo $row['TENKHUVUC'].', Quận '.$_GET['quan']?></span><br>
                                Ghi chú: <span style="font-size: 17px; font-weight: bold;"><?php echo $_GET['note']?></span><br>
                                Ngày mua: <span style="font-size: 17px; font-weight: bold;"><?php echo date('d-m-Y') ?></span><br>
                                <?php
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                        echo '<table style="margin-top: 10px !important;">';
                                        echo '<tr><th>Tên SP</th><th>Size</th><th>Số lượng</th><th>Đơn giá</th><th>Tổng tiền</th></tr>';
                                        $tongtien = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            $sql = "select * from sanpham s 
                                                    join sizecuasanpham sz on sz.MASP=s.MASP
                                                    where sz.MASP = '{$item['id']}'";
                                            $result = $conn->query($sql);
                                            $sp = $result->fetch_assoc();
                                                
                                            echo '<tr>';
                                            echo '<td>' . $sp['TENSP'] . '</td>';
                                            echo '<td>' . $item['size'] . '</td>';
                                            echo '<td>' . $item['quant'] . '</td>';
                                            echo '<td>' . number_format($sp['DONGIASP']) . ' đ</td>';
                                            echo '<td>' . number_format($sp['DONGIASP']*$item['quant']) . ' đ</td>';
                                            echo '</tr>';
                                            $tongtien += ($sp['DONGIASP']*$item['quant']);
                                        }
                                    
                                        echo '</table>';
                                    }
                                ?>
                                <div style="text-align: right;">
                                    <h4>Tổng tiền: <span style="font-weight: bold;"><?php echo number_format($tongtien) ?> đ</span></h4>
                                    <h4>Phí ship: <span style="font-weight: bold;"><?php echo number_format($row['PHIGIAO']) ?> đ</span></h4>
                                    <hr>
                                    
                                </div>
                                <input type="hidden" name="khuvuc" value="<?php echo $row['MAKHUVUC'] ?>">
                                <input type="hidden" name="phigiao" value="<?php echo $row['PHIGIAO'] ?>">
                                <input type="hidden" name="ghichu" value="<?php echo $_GET['note'] ?>">
                                
                                <div class="row" style="padding-bottom: 40px;">
                                    <div style="text-align: center;" class="col-12">
                                        <h3>Tổng thiệt hại: <span style="font-weight: bold;"><?php echo number_format($tongtien+$row['PHIGIAO']) ?> đ</span></h3>
                                        <button class="dathang" style="margin-top: 15px; padding: 10px 20px; background-color: #ff9702; color: white; border:none; border-radius: 15px;" 
                                            type="submit"><span style="font-size: 17px; font-weight: bold;">Đặt hàng</span></button>
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