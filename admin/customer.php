<style>
    *{
        font-family: 'Open Sans', sans-serif;
    }
    h2,td{
        font-weight: bold;

    }
    table {
        border: 2px;
    }
</style>
<h2> Data Customer</h2>

<table class="table table-striped  table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no =1; ?>
        <?php $ambil = $conn->query("SELECT * FROM customer");?>
        <?php while( $tampil = $ambil->fetch_assoc() ){?>  
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $tampil['nama_customer']?></td>
            <td><?php echo $tampil['email_customer']?></td>
            <td><?php echo $tampil['telepon']?></td>
            <td>
                <a href="" class="btn btn-danger">Hapus</a>
                <a href="" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?page=tambahcustomer" class="btn btn-primary">Tambah Customer</a>