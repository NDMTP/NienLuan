<!DOCTYPE html>
<html class="no-js" lang="en">

<?php
    require 'head.php';
    require 'connect.php';
?>
<body class="biolife-body" style="margin-top: 300px;">

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
    <?php require 'header.php' ?>

    <!--Hero Section-->
    <div class="hero-section hero-background">
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 style="margin-top: 20px;" class="box-title">Giỏ hàng của bạn</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <?php
                                $tongtien = 0;
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                ?>
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                        <th class="product-action"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($_SESSION['cart'] as $key => $item) {
                                            $sql = "select * from sanpham where MASP = '{$item['id']}'";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            $string = $row['MASP'];
                                            $masp = preg_replace('/[0-9]/', '', $string);
                                    ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="assets/images/products/<?php echo $masp."/".$row['LINKANH']?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#"><?php echo $row['TENSP']?></a>
                                            <!-- <div class="action">
                                                <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div> -->
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo number_format($row['DONGIABANSP']) ?> đ</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol"></span><?php echo number_format($row['DONGIABANSP']+1000) ?> đ</span></del>
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <div class="qty-input">
                                                    <input type="text" name="qty12554" value="<?php echo $item['quant'] ?>" data-max_value="20" data-min_value="1" data-step="1">
                                                    <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                    <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo number_format($item['quant']*$row['DONGIABANSP']); $tongtien+=($item['quant']*$row['DONGIABANSP'])?> đ</span></ins>
                                            </div>
                                        </td>
                                        <td class="product-action" data-title="Action">
                                            <div class="price price-contain">
                                                <a href="delete-one-cart.php?key=<?php echo $key ?>">
                                                    <ins><span class="price-amount"><span class="currencySymbol"></span>
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span></ins>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a href="category-grid.php" class="btn back-to-shop">Mua thêm</a>
                                            <button class="btn btn-update" type="submit">Cập nhật</button>
                                            <a href="delete-cart.php" class="btn btn-clear" type="reset">xoá tất cả</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <?php
                                } else {
                                    echo '<div class="shpcart-subtotal-block">';
                                    echo '<h2>Không có sản phẩm nào trong giỏ hàng</h2>';
                                    echo '<div class="btn-checkout">';
                                    echo '   <a href="category-grid.php" class="btn checkout w-25">Xem tất cả sản phẩm</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    
                                }
                                ?>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line" style="margin-top: 20px;">
                                    <b class="stt-name">Tổng <span class="sub">(<?php echo $_SESSION['slsp'] ?> món)</span></b>
                                    <span class="stt-price"><?php echo number_format($tongtien) ?> đ</span>
                                </div>
                                <form action="thongtinmuahang.php" method="get">

                                    <div class="subtotal-line"><b class="stt-name">Quận <br><span style="color: red !important;" class="sub">(*Chỉ giao trong các quận sau:)</span></span></b></div>
                                        <!-- <input type="radio" value="">
                                            <span  style="color:#252525; font-size: 17px !important; margin-left: 5px;">Quận Ninh Kiều </span><br>
                                        </input>
                                        <input type="radio" value="">
                                            <span  style="color:#252525; font-size: 17px !important; margin-left: 5px;">Quận Bình Thuỷ</span> <br>
                                        </input>
                                        <input type="radio" value="">
                                            <span  style="color:#252525; font-size: 17px !important; margin-left: 5px;">Quận Cái Răng</span><br>
                                        </input>-->
                                        <div>
                                            <div style="width: 100% !important;" class="form_combobox w-100">
                                                <select required style="color: black !important; margin-left: 10px !important; " name="area" id="areaSelect">
                                                    <option selected disabled value="">Chọn quận</option>
                                                    <option value="NK">Ninh Kiều</option>
                                                    <option value="BT">Bình Thuỷ</option>
                                                    <option value="CR">Cái Răng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="phuong">
                                            
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const areaSelect = document.getElementById("areaSelect");

                                                areaSelect.addEventListener("change", function() {
                                                    const phuong =document.getElementById('phuong');
                                                    phuong.innerHTML = '<div style="width: 100% !important;" class="form_combobox w-100" id="phuong"><select style="color: black !important; margin-left: 10px !important; " name="area" id="areaSelect"></select></div>';
                                                });
                                            });
                                        </script>
                                    <div style="margin-top: 5px !important;" class="btn-checkout">
                                        <button style="width: 100%;" type="submit" class="btn checkout">Đặt hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Related Product-->
                
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php  
        require 'footer.php';
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