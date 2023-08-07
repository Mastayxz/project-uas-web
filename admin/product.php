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
<h2 >Data Product</h2>

<table class="table table-striped table-bordered table-hover " >
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no =1; ?>
        <?php $ambil = $conn->query("SELECT * FROM product");?>
        <?php while( $tampil = $ambil->fetch_assoc() ){?>  
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo  $tampil['nama_product'];?></td>
            <td><?php echo  $tampil['harga_product'];?></td>
            <td><?php echo  $tampil['qty'];?></td>
            <td>
                <img src="../foto_product/<?php echo $tampil['image_product']; ?>" width="100">
            </td>
            <td><?php echo  $tampil['dekripsi_product'];?></td> 
            <td>
                <a href="index.php?page=hapusproduct&id=<?php echo $tampil['id_product'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                <a href="index.php?page=editproduct&id=<?php echo $tampil['id_product']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <?php $no++;?>
        <?php  }?>
    </tbody>
</table>
<a href="index.php?page=tambahproduct" class="btn btn-primary">Tambah Product</a>