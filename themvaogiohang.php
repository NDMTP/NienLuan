<?php

session_start();
// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($product) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $product['id'] and $item['size'] === $product['size'] and $item['level'] === $product['level']) {
            $item['quant'] += $product['quant'];
            $_SESSION['slsp']+=$product['quant'];
            $found = true;
            break;  
        }
    }

    // Nếu chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
    if (!$found) {
        $_SESSION['cart'][] = array(
            'id' => $product['id'],
            'quant' => $product['quant'],
            'level' => $product['level'],
            'size' => $product['size']
        );
        $_SESSION['slsp']+=$product['quant'];
    }
}

$pdid = $_GET['pdid'];
$size = $_GET['size'];
if (isset($_GET['level'])) $lv = $_GET['level'];
else $lv = "";
$qty = $_GET['qty12554'];

// Thêm sản phẩm vào giỏ hàng

$productToAdd = array(
    'id' => $pdid,
    'quant' => $qty,
    'level' => $lv,
    'size' => $size,
);

if (isset($_SESSION["lname"])){
    addToCart($productToAdd);
    header('Location: product-detail.php?id='.$pdid.'&added=1');

} else {
    header('Location: login.php?login=1');
}



?>