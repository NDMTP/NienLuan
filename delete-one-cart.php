<?php
    session_start();
    $key = $_GET['key'];
    unset($_SESSION['cart'][$key]);
    $_SESSION['slsp']--;
    header('Location: cart-page.php');
?>