<?php 
session_start();
// mengabil url id product
$id_product=$_GET['id'];


// jika produk sudah ada di keranjang maka jumlah +1
if(isset($_SESSION['cart'][$id_product])){

    $_SESSION['cart'][$id_product]+=1;
}

else{

    $_SESSION['cart'][$id_product]=1;
}



echo "<script>alert('Product ditambahkan ke keranjang')</script>";
echo "<script>location='./keranjang.php'</script>";
?>