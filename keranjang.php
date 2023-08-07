    <?php 
    session_start();
    include "conection.php";
    if (!isset($_SESSION['customer'])) {
        # code...
    echo '<script>alert("Silahkan Login");</script>';
    echo '<script>location="login.php";</script>';
    }

    if (empty($_SESSION['cart']) || !isset($_SESSION['cart'])) {
        # code...
        echo '<script>alert("Keranjang Kosong silahkan belanja 😊");</script>';
        echo '<script>location="index.php";</script>';
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./admin/assets/css/design.css">
         <?php include "./admin/assets/link.php"; ?>
        <title>Binary Shoping</title>
    </head>
    <body class="">


    <!-- navbar -->

    <!-- navbar -->
    <?php include "menu.php" ;?>

    <?php 

    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";
    ?>
    <!-- content -->
    <br>
    <section class="kontent">
    <div class="container  ">
    
        <h2 class="text-dark fw-bold mt-5 mb-3" >Keranjang Belanja</h2>
    <table class="table  table-hover shadow rounded-4 ">
        <thead>
            <th>No</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>aksi
            </th>
        </thead>
        <tbody class="table-group-divider" >
            <?php $no = 1; ?>
            <?php foreach ($_SESSION['cart'] as $id_product => $jumlah) { ?>
            
            <?php 
                $ambil = $conn->query("SELECT * FROM product WHERE id_product='$id_product'");
                $tampil = $ambil->fetch_assoc();
               
                // echo "<pre>";
                // print_r($tampil);
                // echo "</pre>";
            ?>
            <td><?php echo $no;?></td>
            <td><?php echo $tampil['nama_product'] ?></td>
            <td>Rp.<?php echo number_format($tampil['harga_product']) ;?></td>
            <td><?php echo $jumlah;?> pcs</td>
            <?php $subHarga = $tampil["harga_product"] * $jumlah;?>
            <td>Rp. <?php echo number_format($subHarga) ;?></td>
            <td>
                <a href="hapuscart.php?id=<?php echo $tampil['id_product'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
            <?php $no++; ?>
        </tbody>
        <?php } ?>
    </table>
            <a href="index.php" class="btn btn-warning shadow">Belanja</a>
            <a href="checkout.php" class="btn btn-outline-primary shadow ">Checkout</a>
        
    </div>
    </section>

    </body>
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="admin/assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="admin/assets/js/jquery.metisMenu.js"></script>
        <!-- MORRIS CHART SCRIPTS -->
        <script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="admin/assets/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="admin/assets/js/custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </html>