<h2>Data Pembelian</h2>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Tangal Pembelian</th>
            <th>Total Pembelian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;?>
        <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_pelanggan = customer.id_customer");?>
        <?php while($tampil = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $tampil['nama_customer'];?></td>
            <td><?php echo $tampil['tanggal_pembelian'];?></td>
            <td><?php echo $tampil['total_pembelian'];?></td>
            <td>
                <a href="index.php?page=detail&id=<?php echo $tampil["id_pembelian"];?>" class="btn btn-primary">Detail</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>