
<!-- HEADER -->
<header id="header" class="header-area style-01 layout-01">
    <div class="header-top hidden-xs hidden-sm">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>ndmtpfood@company.com</a></li>
                </ul>
                <ul class="social-list circle-layout">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/ngocduymtp/"><i class="fa fa-facebook"
                                aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="header-middle hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="index.php" class="biolife-logo"><img src="assets/images/ndmtp.png" alt="biolife logo"
                            width="170" height="36"></a>
                </div>
                <div class="col-lg-9 col-md-10 padding-top-6px">
                <div class="header-search-bar layout-01 no-product-cat">
    <!-- Form tìm kiếm bằng văn bản -->
    <form action="category-grid.php" class="form-search" name="text-search" method="get">
        <input type="text" name="search" class="input-text" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>" placeholder="Bạn đang tìm gì....">
        <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
    </form>

    <!-- Form tìm kiếm bằng hình ảnh -->
    <form action="ai/image-search.php" class="form-upload" name="image-search" method="post" enctype="multipart/form-data">            
        <input type="file" id="img" name="img" accept="image/*" style="display: none;">
        <label for="img">
            <button type="button" class="btn-submit" onclick="chooseImage()">
                <i style="margin-right: 35px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-camera" viewBox="0 0 15 35">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                    </svg>
                </i>
            </button>
        </label>
        <button type="button" onclick="uploadAndSearch()" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lắng nghe sự kiện keydown trên trường nhập văn bản
        document.querySelector('input[name="search"]').addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Ngăn chặn hành động mặc định của Enter (submit form)
                var form = document.querySelector('.form-search');
                form.submit();
            }
        });
    });

    function chooseImage() {
        var imageInput = document.getElementById('img');
        imageInput.click();
    }

    function uploadAndSearch() {
        var form = document.querySelector('.form-upload');
        form.submit();
    }
    
    // Xử lý sự kiện khi tải lên hình ảnh
    document.getElementById('img').addEventListener('change', function() {
        var form = document.querySelector('.form-upload');
        form.submit();
    });
</script>






<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lắng nghe sự kiện keydown trên trường nhập văn bản
        document.querySelector('input[name="s"]').addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Ngăn chặn hành động mặc định của Enter (submit form)
                var searchValue = this.value.trim(); // Lấy giá trị của trường nhập văn bản và loại bỏ khoảng trắng thừa
                if (searchValue.length > 0) { // Kiểm tra xem có từ khóa tìm kiếm không rỗng
                    // Thực hiện tìm kiếm bằng văn bản tại đây, ví dụ:
                    alert("Tìm kiếm bằng văn bản: " + searchValue);
                }
            }
        });
    });

    function chooseImage() {
        var imageInput = document.getElementById('img');
        imageInput.click();
    }

    function uploadAndSearch() {
        var form = document.querySelector('.form-search');
        form.submit();
    }
</script> -->





                    
                    <div class="live-info">
                        <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+84)
                                939 123 4567</b></p>
                        <p class="working-time">Thứ Hai-Thứ Sáu: 6:30am-8:30pm</p>
                        <p class="working-time">Thứ Bảy-Chủ Nhật: 9:00am-10:30pm</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header-bottom biolife-sticky-object">
        <div class="container md-possition-relative">
            <div class="row">
                <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
                    <div class="vertical-menu vertical-category-block ">
                        <div class="block-title">
                            <span class="menu-icon">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                            <span class="menu-title">Tất cả sản phẩm</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up"
                                    aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            <ul class="menu clone-main-menu">
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Fruit & Nut Gifts"><i
                                            class="biolife-icon icon-fruits"></i>Trái cây</a>
                                    <div class="wrap-megamenu lg-width-550 md-width-640">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div
                                                    class="col-lg-5 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">

                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Trái cây</h4>
                                                        <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='01'LIMIT 10";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="biolife-products-block max-width-270">
                                                        <h4 class="menu-title">Sản phẩm bán chạy nhất</h4>
                                                        <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center"
                                                            data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}'>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/TC/traicay1.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Trái cây</b>
                                                                        <h4 class="product-title"><a href="product-detail.php?id=TC1"
                                                                                class="pr-name">Sầu riêng</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>99.000</span></ins>
                                                                            <del><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>109.000</span></del>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/TC/traicay21.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Trái cây</b>
                                                                        <h4 class="product-title"><a href="product-detail.php?id=TC21"
                                                                                class="pr-name">Nho</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>75.000</span></ins>
                                                                            <del><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>85.000</span></del>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="product-detail.php?id=TC14" class="link-to-product">
                                                                            <img src="assets/images/products/TC/traicay14.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Trái cây</b>
                                                                        <h4 class="product-title"><a href="product-detail.php?id=TC14"
                                                                                class="pr-name">Cam</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>69.000</span></ins>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 md-margin-top-9">
                                                    <div class="biolife-brand">
                                                        <ul class="brands">
                                                            <li><a href="#"><img
                                                                        src="assets/images/megamenu/brand-organic.png"
                                                                        width="161" height="136" alt="organic"></a></li>
                                                            <li><a href="#"><img
                                                                        src="assets/images/megamenu/brand-explore.png"
                                                                        width="160" height="136" alt="explore"></a></li>
                                                            <li><a href="#"><img
                                                                        src="assets/images/megamenu/brand-organic-2.png"
                                                                        width="99" height="136" alt="organic 2"></a>
                                                            </li>
                                                            <li><a href="#"><img
                                                                        src="assets/images/megamenu/brand-eco-teas.png"
                                                                        width="164" height="136" alt="eco teas"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Vegetables"><i
                                            class="biolife-icon icon-broccoli-1"></i>Cải</a>
                                    <div class="wrap-megamenu lg-width-550 md-width-640 ">
                                        <div class="mega-content">
                                            <div class="row">
                                                <div
                                                    class="col-lg-5 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="wrap-custom-menu vertical-menu">
                                                        <h4 class="menu-title">Cải</h4>
                                                        <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='02'LIMIT 10";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                    <div class="biolife-products-block max-width-270">
                                                        <h4 class="menu-title">Sản phẩm bán chạy nhất</h4>
                                                        <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center"
                                                            data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}'>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/p-31.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Cải</b>
                                                                        <h4 class="product-title"><a href="#"
                                                                                class="pr-name">Cải bó xôi</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>85.000</span></ins>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/p-32.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Cải</b>
                                                                        <h4 class="product-title"><a href="#"
                                                                                class="pr-name">Cải dưa</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>7.000</span></ins>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="product-item">
                                                                <div class="contain-product none-overlay">
                                                                    <div class="product-thumb">
                                                                        <a href="#" class="link-to-product">
                                                                            <img src="assets/images/products/p-33.jpg"
                                                                                alt="dd" width="270" height="270"
                                                                                class="product-thumnail">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info">
                                                                        <b class="categories">Cải</b>
                                                                        <h4 class="product-title"><a href="#"
                                                                                class="pr-name">Cải ngọt</a></h4>
                                                                        <div class="price">
                                                                            <ins><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>7.000</span></ins>
                                                                            <del><span class="price-amount"><span
                                                                                        class="currencySymbol">đ</span>10.000</span></del>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="#" class="menu-name" data-title="Fresh Berries"><i
                                            class="biolife-icon icon-grape"></i>Việt Quốc</a>
                                </li>
                                <li class="menu-item"><a href="#" class="menu-name" data-title="Ocean Foods"><i
                                            class="biolife-icon icon-fish"></i>Hải Sản</a></li>
                                <li class="menu-item menu-item-has-children ">
                                    <a href="#" class="menu-name" data-title="Butter & Eggs"><i
                                            class="biolife-icon icon-honey"></i>Bơ và Trứng</a>

                                </li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-fast-food"></i>Đồ Ăn Nhanh</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-beef"></i>Thịt</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-onions"></i>Hành</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-avocado"></i>Đu đủ</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-contain"></i>Yến Mạch</a></li>
                                <li class="menu-item"><a href="#" class="menu-title"><i
                                            class="biolife-icon icon-fresh-juice"></i>Chuối</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs md-possition-initial">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu"
                            data-menuname="main menu">
                            <li class="menu-item"><a href="index.php">Trang chủ</a></li>
                            <li class="menu-item menu-item-has-children has-megamenu">
                                <a href="category-grid.php" class="menu-name" data-title="Shop">Sản phẩm</a>
                                <div class="wrap-megamenu lg-width-900 md-full-width">
                                    <div class="mega-content">
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Trái cây</h4>
                                                <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='01'LIMIT 10";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Cải</h4>
                                                <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='02'";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu ">
                                                <h4 class="menu-title">Hải Sản</h4>
                                                <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='03'";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Bơ và Trứng</h4>
                                                <ul class="menu">
                                                <?php
                                                    $sql = "SELECT * FROM sanpham where maloai='04'";
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                        $result = $conn->query($sql);
                                                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                        foreach ($result_all as $row) {
                                                ?>
                                                <li><a href="product-detail.php?id=<?php echo $row['MASP'] ?>"><?php echo $row['TENSP'] ?></a></li>
                                                <?php }} ?>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children ">
                                <a href="#" class="menu-name" data-title="Product">Hóa đơn</a>

                            </li>
                            <li class="menu-item menu-item-has-children has-megamenu">
                                <a href="#" class="menu-name" data-title="Pages">Demo</a>
                                <div class="wrap-megamenu lg-width-800 md-full-width">
                                    <div class="mega-content">
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Home Page</h4>
                                                <ul class="menu">
                                                    <li class="menu-item"><a href="index.html">Home 01</a></li>
                                                    <li class="menu-item"><a href="home-02.html">Home 02</a></li>
                                                    <li class="menu-item"><a href="index-2.html">Home 03</a></li>
                                                    <li class="menu-item"><a href="home-03-green.html">Home 03 Green</a>
                                                    </li>
                                                    <li class="menu-item"><a href="home-04.html">Home 04</a></li>
                                                    <li class="menu-item"><a href="home-04-light.html">Home 04 Light</a>
                                                    </li>
                                                    <li class="menu-item"><a href="home-05.html">Home 05</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Inner Pages</h4>
                                                <ul class="menu">
                                                    <li class="menu-item"><a href="blog-post.html">Blog Single</a></li>
                                                    <li class="menu-item"><a href="blog-v01.html">Blog Style 01</a></li>
                                                    <li class="menu-item"><a href="blog-v02.html">Blog Style 02</a></li>
                                                    <li class="menu-item"><a href="blog-v03.html">Blog Style 03</a></li>
                                                    <li class="menu-item"><a href="contact.html">Contact Us</a></li>
                                                    <li class="menu-item"><a href="about-us.html">About Us</a></li>
                                                    <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                                                    <li class="menu-item"><a href="shopping-cart.html">Shopping Cart</a>
                                                    </li>
                                                    <li class="menu-item"><a href="login.html">Login/Register</a></li>
                                                    <li class="menu-item"><a href="404.html">404</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Category Pages</h4>
                                                <ul class="menu">
                                                    <li class="menu-item"><a href="category-grid-3-cols.html">Grid 3
                                                            Cols</a></li>
                                                    <li class="menu-item"><a href="category-grid.php">Tất cả sản phẩm</a>
                                                    </li>
                                                    <li class="menu-item"><a href="category-grid-6-cols.html">Grid 6
                                                            Cols</a></li>
                                                    <li class="menu-item"><a href="category-grid-left-sidebar.html">Grid
                                                            Left Sidebar</a></li>
                                                    <li class="menu-item"><a
                                                            href="category-grid-right-sidebar.html">Grid Right
                                                            Sidebar</a></li>
                                                    <li class="menu-item"><a href="category-list.html">List Full</a>
                                                    </li>
                                                    <li class="menu-item"><a href="category-list-left-sidebar.html">List
                                                            Left Sidebar</a></li>
                                                    <li class="menu-item"><a
                                                            href="category-list-right-sidebar.html">List Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                            <div class="wrap-custom-menu vertical-menu">
                                                <h4 class="menu-title">Product Types</h4>
                                                <ul class="menu">
                                                    <li class="menu-item"><a
                                                            href="single-product-simple.html">Simple</a></li>
                                                    <li class="menu-item"><a
                                                            href="single-product-grouped.html">Grouped</a></li>
                                                    <li class="menu-item"><a href="single-product.html">Variable</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="single-product-external.html">External/Affiliate</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="single-product-onsale.html">Countdown</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item"><a href="contact.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1 col-md1 col-xs-3">
                <div class="biolife-cart-info">
                    <div class="mobile-search">
                        <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                        <div class="mobile-search-content">
                            <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                <input type="text" name="s" class="input-text" value="" placeholder="Tìm ở đây...">
                                <select name="category">
                                    <option value="-1" selected>All Categories</option>
                                    <option value="vegetables">Vegetables</option>
                                    <option value="fresh_berries">Fresh Berries</option>
                                    <option value="ocean_foods">Ocean Foods</option>
                                    <option value="butter_eggs">Butter & Eggs</option>
                                    <option value="fastfood">Fastfood</option>
                                    <option value="fresh_meat">Fresh Meat</option>
                                    <option value="fresh_onion">Fresh Onion</option>
                                    <option value="papaya_crisps">Papaya & Crisps</option>
                                    <option value="oatmeal">Oatmeal</option>
                                </select>
                                <button type="submit" class="btn-submit">go</button>
                            </form>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['email'])){
                    ?>
                        <div class="minicart-block row" style="margin-top: 10px;">
                            <div class="minicart-contain">
                                <a href="javascript:void(0)" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-cart-mini biolife-icon"></i>
                                        
                                    </span>
                                </a>
                                <div class="cart-content">
                                    <div class="cart-inner">
                                        <?php
                                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $item) {
                                                $sql = "SELECT * FROM sanpham WHERE MASP = '{$item['id']}'";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch_assoc();
                                                $string = $row['MASP'];
                                                $masp = preg_replace('/[0-9]/', '', $string);
                                        ?>
                                        <ul class="products">
                                            <li>
                                                <div class="minicart-item">
                                                    <div class="thumb">
                                                        <a href="#"><img src="assets/images/products/<?php echo $masp."/".$row['LINKANH']?>" width="90" height="90" alt="img"></a>
                                                    </div>
                                                    <div class="left-info">
                                                        <div class="product-title"><a href="#" class="product-name"><?php echo $row['TENSP']?></a></div>
                                                        <div class="price">
                                                            <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo number_format($row['DONGIABANSP']) ?></span></ins>
                                                            <del><span class="price-amount"><span class="currencySymbol"></span><?php echo number_format($row['DONGIABANSP']+10000) ?></span></del>
                                                        </div>
                                                        <div class="qty">
                                                            <label for="cart[id123][qty]">Số lượng:</label>
                                                            <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="<?php echo $item['quant'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <?php 
                                            }
                                        ?>
                                        <p class="btn-control">
                                            <a href="#" class="btn view-cart">Thanh toán</a>
                                            <a href="cart-page.php" class="btn">Chỉnh sửa giỏ</a>
                                        </p>
                                        <?php
                                            } else {
                                                echo '<p style="margin-top: 15px; font-size: 18px !important">Không có sản phẩm nào trong giỏ hàng</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>

                    <div class="mobile-menu-toggle">
                        <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-3">
                <div>
                    <?php

                    $is_logged_in = isset($_SESSION["email"]);

                    if ($is_logged_in) {
                        ?>
                            <div class="hidden-sm hidden-xs m-2">
                                <div class="primary-menu">
                                    <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                        <li class="menu-item menu-item-has-children has-megamenu">
                                            <a href="#" class="menu-name" data-title="Shop" ><span>Chào mừng, <?php echo  $_SESSION["lname"] ?></span></a>
                                            <div class="wrap-megamenu" style="right: 0 !important;">
                                                <div class="mega-content">
                                                    <div class="">
                                                        <div class="wrap-custom-menu vertical-menu-2">
                                                            <h4 class="menu-title">Tài khoản</h4>
                                                            <ul class="menu">
                                                                <li class="menu-item" ><a href="user.php">Thông tin cá nhân</a></li>
                                                                <li class="menu-item" ><a href="doimk.php">Đổi mật khẩu</a></li>
                                                                <li class="menu-item" ><a href="dangxuat.php">Đăng xuất</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>                
                            
                        <?php
                    }
                    else {
                        ?>
                            <div class="hidden-sm hidden-xs m-2">
                                <div class="primary-menu">
                                    <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                        <li class="menu-item">
                                            <a href="login.php" class="menu-name"><span>Đăng nhập/Đăng ký  </span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</header>