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

        <title>Checkout-page</title>
    </head>
    <body >
    <!-- navbar -->

   <?php include "menu.php"; ?>
    <pre>
        <!-- <?php  print_r($_SESSION['customer']);?> -->
    </pre>
    
    <!-- kontent keranjnag -->
    <section class="kontent">
    <div class="container ">
    <h2 class="text-dark mt-4 mb-3 fw-bold">Checkout Produk Anda</h2>
    <table class="table table-bordered shadow">
        <thead>
            <th>No</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subharga</th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $totalBelanja=0;?>
            <?php foreach ($_SESSION['cart'] as $id_product => $jumlah) { ?>
            
            <?php 
                $ambil = $conn->query("SELECT * FROM product WHERE id_product='$id_product'");
                $tampil = $ambil->fetch_assoc();
                $subHarga = $tampil["harga_product"] * $jumlah;
                // echo "<pre>";
                // print_r($tampil);
                // echo "</pre>";
            ?>
            <td><?php echo $no;?></td>
            <td><?php echo $tampil['nama_product'] ?></td>
            <td>Rp.<?php echo number_format($tampil['harga_product']) ;?></td>
            <td><?php echo $jumlah;?> pcs</td>
            <td>Rp. <?php echo number_format($subHarga) ;?></td>
            <?php $no++; ?>
            <?php $totalBelanja+=$subHarga ?>
            </tbody>
        <?php } ?>
    
        <tfoot>
            <th colspan="4">Total Belanja</th>
            <th>Rp. <?php echo number_format($totalBelanja) ;?></th>
        </tfoot>
    </table>
    <form action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group shadow">
                            <input type="text" value="<?php echo $_SESSION['customer']['nama_customer']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group shadow">
                            <input type="text" value="<?php echo $_SESSION['customer']['telepon']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control shadow" name="id_ongkir">
                            <option value="">Pilih ongkos kirim</option>
                                <?php 
                                $ambil = $conn->query("SELECT * FROM ongkir ");
                                while ($perongkir=$ambil->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $perongkir['id_ongkir']; ?>">
                                    <?php  echo $perongkir['nama_provinsi']; ?> - 
                                Rp.  <?php echo number_format($perongkir['tarif']); ?>
                                </option>
                                <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="form-group shadow">
                    <label for="" class="fw-bold text-dark my-2     ">Alamat Pengiriman</label>
                    <textarea name="alamat"  class="form-control"  placeholder="masukan alamat pengiriman"></textarea>
                </div>
                <button class="btn btn-outline-primary shadow mt-2" name="checkout">Checkout</button>
    </form>

        <?php 
            if (isset($_POST['checkout'])) {
                # code..
                $id_customer = $_SESSION['customer']['id_customer'];
                $id_ongkir = $_POST['id_ongkir'];
                $tanggal = date("Y-m-d");
                $alamat = $_POST["alamat"];

                $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ");
                $array = $ambil->fetch_assoc();
                $provinsi = $array['nama_provinsi'];
                $tarif = $array['tarif'];

                $total_pembelian = $totalBelanja+$tarif;

                // menyimpan 'data 
                $conn->query("INSERT INTO `pembelian`(`id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian` ,`nama_provinsi`, `tarif`,alamat) VALUES ('$id_customer','$id_ongkir','$tanggal','$total_pembelian','$provinsi', '$tarif','$alamat')");

            
                // mendapat id pembelian  terbaru 
                $id_baru = $conn->insert_id;
                foreach ($_SESSION['cart'] as $id_product => $jumlah) {
                    # code...
                    $conn->query("INSERT INTO `pembelian_product`(`id_pembelian`, `id_product`, `jumlah`) VALUES ('$id_baru','$id_product','$jumlah')");

                    // menupdate qty
                    $conn->query("UPDATE product SET qty=qty-$jumlah WHERE id_product='$id_product'");
                }
                
                // kosongkan keranjanng 
                unset($_SESSION['cart']);

                echo '<script>alert("Produk telah di checkout");</script>';
                echo "<script>location='nota.php?id=$id_baru';</script>";
            }
        ?>

            
    </div>
    </section>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    </html>