<?php 
session_start();
$id_product = $_GET['id'];
unset($_SESSION['cart'][$id_product]);

echo '<script>alert("product dihapus dari keranjang!");</script>';
echo '<script>location="keranjang.php";</script>';
?>