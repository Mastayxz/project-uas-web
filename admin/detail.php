<?php 
   
    $ambil = $conn->query("SELECT * FROM pembelian JOIN customer
    ON pembelian.id_pelanggan=customer.id_customer 
    WHERE pembelian.id_pembelian= '$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3 style="font-weight: bold;">Pembelian</h3>
        <Strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></Strong><br>
        Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
        Total : Rp. <?php echo number_format($detail['total_pembelian']) ;?>
    </div>
    <div class="col-md-4">
        <h3 style="font-weight: bold;">Customer</h3>
        <strong><?php echo $detail['nama_customer']; ?></strong><br>
        
        <?php echo  $detail['email_customer'];?> <br>
        <?php echo  $detail['telepon'];?>
        
    </div>
    <div class="col-md-4">
        <h3 style="font-weight: bold;">Pengiriman</h3>
        <strong><?php echo $detail['nama_provinsi']; ?></strong><br>
        Ongkos kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
        Alamat :  <?php echo $detail['alamat']; ?>
    </div>
</div>
<br>

<table class="table table-striped table-bordered table-hover">
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