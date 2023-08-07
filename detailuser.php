<?php 
include "conection.php";
// memperoleh id product 
session_start();
$id_product = $_GET['id'];

// query ambil data 
$ambil = $conn->query("SELECT * FROM product WHERE id_product = '$id_product'");
$detail = $ambil->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/assets/css/design.css">
     <?php include "./admin/assets/link.php"; ?>
    <title>Document</title>
</head>
<body class=" text-dark">
    <!-- navbar -->
    <?php include "menu.php" ?>

    <!-- kontent -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="./foto_product/<?php echo $detail['image_product']; ?>" alt="" style="height:700px;" class="img-thumbnail  shadow mt-5">
                </div>
                <div class="col-md-6 mt-5">
                    <h2 class="card-title mb-3 fw-bold"><?php echo $detail['nama_product']; ?></h2>
                    <h4 class="card-text">Rp. <?php echo number_format($detail['harga_product']) ; ?></h4>
                    <h5 class="card-text mt-3">Stok : <?php echo $detail['qty']; ?></h5>
                    <form action="" method="post">
                        <div class="form-group mt-4">
                        <label for="" class="mb-3">Masukan Jumlah </label>
                            <div class="input-group">
                                <input type="number" name="jumlah" min="1" class="form-control     ">
                                <div class="input-group-btn">
                               <button  class="btn btn-primary shadow  " name="beli">Add to Cart</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['beli'])) {
                        # code...
                        $jumlah=$_POST['jumlah'];
                        if($jumlah >$detail['qty']){
                            echo '<div class="alert alert-danger">stok tidak cukup</div>
                           ';
                        }
                        else{
                            $_SESSION['cart'][$id_product] = $jumlah;
                            
                        echo "<script>alert('Product ditambahkan ke keranjang')</script>";
                        echo "<script>location='./keranjang.php'</script>";
                        }
                       

                        

                    }
                    ?>
                    <p class="mt-3"><?php echo  $detail['dekripsi_product'];?></p>
                </div>
            </div>
            
       </div>
    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>