    
    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-01">
        <div class="header-top hidden-xs hidden-sm">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>duybii922002@gmail.com</a></li>
                    </ul>
                    <ul class="social-list circle-layout">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.facebook.com/ngocduymtp/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                       
                <?php
session_start();
$is_logged_in = isset($_SESSION["email"]);

if ($is_logged_in) {
    
    echo '<span style="font-size: 14px; font-weight: 400; color: black; font-family: \'Manrope\', sans-serif;">Chào mừng, ' . $_SESSION["hoten"] . '</span>';
    echo '<a href="user.php" class="user-link"><i class="biolife-icon icon-login"></i></a>';
    echo '<br><a href="doimk.php" class="login-link"></br><span style="font-size: 14px; font-weight: 400; color: black; font-family: \'Manrope\', sans-serif;">Đổi mật khẩu     </span></a>';
    echo '<a href="dangxuat.php" class="login-link"></i><span style="font-size: 14px; font-weight: 400; color: black; font-family: \'Manrope\', sans-serif;">    Đăng xuất</span></a>';
}
 else {
    echo '<a href="login.php" class="login-link"><i class="biolife-icon icon-login"></i><span style="font-size: 14px; font-weight: 400; color: black; font-family: \'Manrope\', sans-serif;">Đăng nhập/Đăng ký</span></a>';
}
?>          
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="index.php" class="biolife-logo"><img src="assets/images/ndmtp.png" alt="biolife logo" width="170" height="36"></a>
                    </div>
                    <div class="col-lg-9 col-md-10 padding-top-2px">
                        <div class="header-search-bar layout-01 no-product-cat">
                            <form action="#" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="s" class="input-text" value="" placeholder="Bạn đang tìm gì...">
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+84) 939 123 4567</b></p>
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
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <li class="menu-item menu-item-has-children has-megamenu">
                                        <a href="#" class="menu-name" data-title="Fruit & Nut Gifts"><i class="biolife-icon icon-fruits"></i>Trái cây</a>
                                        <div class="wrap-megamenu lg-width-550 md-width-640">
                                            <div class="mega-content">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                        
                                                        <div class="wrap-custom-menu vertical-menu">
                                                            <h4 class="menu-title">Trái cây</h4>
                                                            <ul class="menu">
                                                                <li><a href="#">Combo trái cây</a></li>
                                                                <li><a href="#">Cam</a></li>
                                                                <li><a href="#">Chuối</a></li>
                                                                <li><a href="#">Táo</a></li>
                                                                <li><a href="#">Nho</a></li>
                                                                <li><a href="#">Lê</a></li>
                                                                <li><a href="#">Trái cây sấy khô</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                        <div class="biolife-products-block max-width-270">
                                                            <h4 class="menu-title">Sản phẩm bán chạy nhất</h4>
                                                            <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}' >
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-08.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Trái cây</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Combo trái cây</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>85.000</span></ins>
                                                                                <del><span class="price-amount"><span class="currencySymbol">đ</span>95.000</span></del>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-34.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Trái cây</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Táo</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>85.000</span></ins>
                                                                                <del><span class="price-amount"><span class="currencySymbol">đ</span>95.000</span></del>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-35.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Trái cây</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Cam</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>69.000</span></ins>
                                                                                
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
                                                        <div class="biolife-brand" >
                                                            <ul class="brands">
                                                                <li><a href="#"><img src="assets/images/megamenu/brand-organic.png" width="161" height="136" alt="organic"></a></li>
                                                                <li><a href="#"><img src="assets/images/megamenu/brand-explore.png" width="160" height="136" alt="explore"></a></li>
                                                                <li><a href="#"><img src="assets/images/megamenu/brand-organic-2.png" width="99" height="136" alt="organic 2"></a></li>
                                                                <li><a href="#"><img src="assets/images/megamenu/brand-eco-teas.png" width="164"  height="136" alt="eco teas"></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item menu-item-has-children has-megamenu">
                                        <a href="#" class="menu-name" data-title="Vegetables"><i class="biolife-icon icon-broccoli-1"></i>Cải</a>
                                        <div class="wrap-megamenu lg-width-550 md-width-640 ">
                                            <div class="mega-content">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                        <div class="wrap-custom-menu vertical-menu">
                                                            <h4 class="menu-title">Cải</h4>
                                                            <ul class="menu">
                                                                <li><a href="#">Cải Bó Xôi</a></li>
                                                                <li><a href="#">Cải Chíp</a></li>
                                                                <li><a href="#">Cải Dưa</a></li>
                                                                <li><a href="#">Cải Ngọt </a></li>
                                                                <li><a href="#">Cải Thảo</a></li>
                                                                <li><a href="#">Cải Thìa</a></li>
                                                                <li><a href="#">Cải Xoong</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                        <div class="biolife-products-block max-width-270">
                                                            <h4 class="menu-title">Sản phẩm bán chạy nhất</h4>
                                                            <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}' >
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-31.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Cải</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Cải bó xôi</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>85.000</span></ins>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-32.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Cải</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Cải dưa</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>7.000</span></ins>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="product-item">
                                                                    <div class="contain-product none-overlay">
                                                                        <div class="product-thumb">
                                                                            <a href="#" class="link-to-product">
                                                                                <img src="assets/images/products/p-33.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                                            </a>
                                                                        </div>
                                                                        <div class="info">
                                                                            <b class="categories">Cải</b>
                                                                            <h4 class="product-title"><a href="#" class="pr-name">Cải ngọt</a></h4>
                                                                            <div class="price">
                                                                                <ins><span class="price-amount"><span class="currencySymbol">đ</span>7.000</span></ins>
                                                                                <del><span class="price-amount"><span class="currencySymbol">đ</span>10.000</span></del>
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
                                        <a href="#" class="menu-name" data-title="Fresh Berries"><i class="biolife-icon icon-grape"></i>Việt Quốc</a>
                                    </li>
                                    <li class="menu-item"><a href="#" class="menu-name" data-title="Ocean Foods"><i class="biolife-icon icon-fish"></i>Hải Sản</a></li>
                                    <li class="menu-item menu-item-has-children ">
                                        <a href="#" class="menu-name" data-title="Butter & Eggs"><i class="biolife-icon icon-honey"></i>Bơ và Trứng</a>
                                        
                                    </li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-fast-food"></i>Đồ Ăn Nhanh</a></li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-beef"></i>Thịt</a></li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-onions"></i>Hành</a></li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-avocado"></i>Đu đủ</a></li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-contain"></i>Yến Mạch</a></li>
                                    <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-fresh-juice"></i>Chuối</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 hidden-sm hidden-xs md-possition-initial">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                <li class="menu-item"><a href="index.php">Trang chủ</a></li>
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="#" class="menu-name" data-title="Shop" >Sản phẩm</a>
                                    <div class="wrap-megamenu lg-width-900 md-full-width">
                                        <div class="mega-content">
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Trái cây</h4>
                                                    <ul class="menu">
                                                        <li><a href="#">Cam</a></li>
                                                        <li><a href="#">Chuối</a></li>
                                                        <li><a href="#">Táo</a></li>
                                                        <li><a href="#">Nho</a></li>
                                                        <li><a href="#">Lê</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Cải</h4>
                                                    <ul class="menu">
                                                        <li><a href="#">Cải Bó Xôi</a></li>
                                                        <li><a href="#">Cải Chíp</a></li>
                                                        <li><a href="#">Cải Dưa</a></li>
                                                        <li><a href="#">Cải Ngọt</a></li>
                                                        <li><a href="#">Cải Thảo</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu ">
                                                    <h4 class="menu-title">Hải Sản</h4>
                                                    <ul class="menu">
                                                        <li><a href="#">Cá</a></li>
                                                        <li><a href="#">Tôm</a></li>
                                                        <li><a href="#">Mực</a></li>
                                                        <li><a href="#">Cua</a></li>
                                                        <li><a href="#">Sò</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Củ</h4>
                                                    <ul class="menu">
                                                        <li><a href="#">Củ Cải Trắng</a></li>
                                                        <li><a href="#">Củ Gừng</a></li>
                                                        <li><a href="#">Củ Cà Rốt</a></li>
                                                        <li><a href="#">Củ Dền</a></li>
                                                        <li><a href="#">Củ Sắn</a></li>
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
                                                        <li class="menu-item" ><a href="index.html">Home 01</a></li>
                                                        <li class="menu-item" ><a href="home-02.html">Home 02</a></li>
                                                        <li class="menu-item" ><a href="index-2.html">Home 03</a></li>
                                                        <li class="menu-item" ><a href="home-03-green.html">Home 03 Green</a></li>
                                                        <li class="menu-item" ><a href="home-04.html">Home 04</a></li>
                                                        <li class="menu-item" ><a href="home-04-light.html">Home 04 Light</a></li>
                                                        <li class="menu-item" ><a href="home-05.html">Home 05</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Inner Pages</h4>
                                                    <ul class="menu">
                                                        <li class="menu-item" ><a href="blog-post.html">Blog Single</a></li>
                                                        <li class="menu-item" ><a href="blog-v01.html">Blog Style 01</a></li>
                                                        <li class="menu-item" ><a href="blog-v02.html">Blog Style 02</a></li>
                                                        <li class="menu-item" ><a href="blog-v03.html">Blog Style 03</a></li>
                                                        <li class="menu-item" ><a href="contact.html">Contact Us</a></li>
                                                        <li class="menu-item" ><a href="about-us.html">About Us</a></li>
                                                        <li class="menu-item" ><a href="checkout.html">Checkout</a></li>
                                                        <li class="menu-item" ><a href="shopping-cart.html">Shopping Cart</a></li>
                                                        <li class="menu-item" ><a href="login.html">Login/Register</a></li>
                                                        <li class="menu-item" ><a href="404.html">404</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Category Pages</h4>
                                                    <ul class="menu">
                                                        <li class="menu-item" ><a href="category-grid-3-cols.html">Grid 3 Cols</a></li>
                                                        <li class="menu-item" ><a href="category-grid.html">Grid 4 Cols</a></li>
                                                        <li class="menu-item" ><a href="category-grid-6-cols.html">Grid 6 Cols</a></li>
                                                        <li class="menu-item" ><a href="category-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                                                        <li class="menu-item" ><a href="category-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                                                        <li class="menu-item" ><a href="category-list.html">List Full</a></li>
                                                        <li class="menu-item" ><a href="category-list-left-sidebar.html">List Left Sidebar</a></li>
                                                        <li class="menu-item" ><a href="category-list-right-sidebar.html">List Right Sidebar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <h4 class="menu-title">Product Types</h4>
                                                    <ul class="menu">
                                                        <li class="menu-item" ><a href="single-product-simple.html">Simple</a></li>
                                                        <li class="menu-item" ><a href="single-product-grouped.html">Grouped</a></li>
                                                        <li class="menu-item" ><a href="single-product.html">Variable</a></li>
                                                        <li class="menu-item" ><a href="single-product-external.html">External/Affiliate</a></li>
                                                        <li class="menu-item" ><a href="single-product-onsale.html">Countdown</a></li>
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
                    <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                        <div class="logo-for-mobile hidden-lg hidden-md">
                            <a href="index.html" class="biolife-logo"><img src="assets/images/logo-biolife-1.png" alt="biolife logo" width="135" height="36"></a>
                        </div>
                        <div class="biolife-cart-info center-align-mobile">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
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
                            <div class="minicart-block layout-02">
                                <div class="minicart-contain">
                                    <div class="icon-contain">
                                        <div class="span-index">
                                            <i class="icon-cart-mini biolife-icon"></i>
                                            <span class="qty">8</span>
                                            <span class="sub-total">0 items - $0.00</span>
                                        </div>
                                        <a href="#" class="btn-to-cart">Go</a>
                                    </div>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="assets/images/minicart/pr-01.jpg" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name">National Fresh Fruit</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id123][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="1" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="assets/images/minicart/pr-02.jpg" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name">National Fresh Fruit</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id124][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id124][qty]" id="cart[id124][qty]" value="1" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="assets/images/minicart/pr-03.jpg" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name">National Fresh Fruit</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id125][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id125][qty]" id="cart[id125][qty]" value="1" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="assets/images/minicart/pr-04.jpg" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name">National Fresh Fruit</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id126][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id126][qty]" id="cart[id126][qty]" value="1" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a href="#"><img src="assets/images/minicart/pr-05.jpg" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a href="#" class="product-name">National Fresh Fruit</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id127][qty]">Qty:</label>
                                                                <input type="number" class="input-qty" name="cart[id127][qty]" id="cart[id127][qty]" value="1" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="btn-control">
                                                <a href="#" class="btn view-cart">view cart</a>
                                                <a href="#" class="btn">checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>