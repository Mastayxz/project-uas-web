<?php 

$ambil = $conn->query("SELECT * FROM product WHERE id_product='$_GET[id]'");
$tampil = $ambil->fetch_assoc();
$imageproduct=$tampil['image_product'];
if (file_exists("../foto_product/$imageproduct")) {
    # code...
    unlink("../foto_product/$imageproduct");
}

$conn->query("DELETE FROM product WHERE id_product='$_GET[id]'"); 

echo '<script>alert("produk terhapus");</script>';
echo '<script>location="index.php?page=product";</script>';
?>

