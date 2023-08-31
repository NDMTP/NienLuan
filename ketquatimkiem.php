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




    <div class="page-contain login-page" style="margin-top: 300px;">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                <body>
                <?php
    ob_start();
    // Lấy dữ liệu file
    $file = $_FILES["img"];

    // Kiểm tra xem file có phải là ảnh không
    if (!is_uploaded_file($file['tmp_name'])) {
        return false;
    }

    // Lấy tên file
    $filename = $file['name'];

    move_uploaded_file($file['tmp_name'], $filename);
    $new_filename = 'img_to_search.png';
    rename($filename, $new_filename);

    system('echo "yes" | python ai.py');

    $imageDirectory = '/NienLuan/assets/images/products/TC/';
ob_end_clean();
    // Mở tệp "data.txt" để đọc
    $myfile = fopen("data.txt", "r");

    // Kiểm tra xem tệp đã mở thành công chưa
    if ($myfile) {
        while (!feof($myfile)) {
            $line = trim(fgets($myfile)); // Lấy dòng và loại bỏ khoảng trắng
            if (!empty($line)) { // Kiểm tra xem dòng có dữ liệu không
                echo '<img src="' . $imageDirectory . $line . '" alt="Image"><br>';
            }
        }

        fclose($myfile); // Đóng tệp sau khi sử dụng
    } else {
        echo "Không thể mở tệp data.txt";
    }
    
?>
</body>
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