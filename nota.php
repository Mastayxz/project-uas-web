<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/assets/css/design.css">
    <?php include "./admin/assets/link.php"; ?>
    <title>Nota-page</title>
</head>
<body class="bg-liht text-dark">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg  shadow bg-primary" >
  <div class="container">
    <a class="navbar-brand fw-bold text-warning " href="#">Suka-suka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mx-3 menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./checkout.php">Checkout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<section class="kontent">
    <div class="container">
    <h2 class=" mt-4 mb-3 fw-bold">Detail Pembelian</h2>

<?php 
    session_start();
    include "conection.php";
    $ambil = $conn->query("SELECT * FROM pembelian JOIN customer
    ON pembelian.id_pelanggan=customer.id_customer 
    WHERE pembelian.id_pembelian= '$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3  class=" mt-4 mb-3 fw-bold">Pembelian</h3>
        <Strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></Strong><br>
        Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
        Total : Rp. <?php echo number_format($detail['total_pembelian']) ;?>
    </div>
    <div class="col-md-4">
        <h3  class=" mt-4 mb-3 fw-bold">Customer</h3>
        <strong><?php echo $detail['nama_customer']; ?></strong><br>
        <p>
        <?php echo  $detail['email_customer'];?> <br>
        <?php echo  $detail['telepon'];?>
        </p>
    </div>
    <div class="col-md-4">
        <h3 class=" mt-4 mb-3 fw-bold">Pengiriman</h3>
        <strong><?php echo $detail['nama_provinsi']; ?></strong><br>
        Ongkos kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
        Alamat :  <?php echo $detail['alamat']; ?>
    </div>
</div>

<table class="table table-striped table-bordered table-hover shadow">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama produk</th>
            <th>Harga</th>
            <th>qty</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no =1; ?>
        <?php $ambil = $conn->query("SELECT * FROM pembelian_product JOIN product 
        ON pembelian_product.id_product=product.id_product  
        WHERE pembelian_product.id_pembelian= '$_GET[id]' ");?>
        <?php while( $tampil = $ambil->fetch_assoc() ){?>  
        <tr>
            <td><?php echo  $no++ ?></td>
            <td><?php echo $tampil['nama_product']; ?></td>
            <td>Rp. <?php echo number_format($tampil['harga_product']) ; ?></td>
            <td><?php echo $tampil['jumlah']; ?></td>
            <td>Rp. <?php echo number_format($tampil['harga_product']*$tampil['jumlah']) ;?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
            <div class="row">
                <div class="col-md-7">
                        <div class="alert alert-info shadow">
                            <p>
                                Silahkan melakukan pembayaaran sebesar Rp.  <?php echo number_format($detail['total_pembelian']); ?>
                            </p>
                        </div>
                </div>
            </div>

    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>