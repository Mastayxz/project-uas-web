<h2>Tambah Product</h2>
<form  method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="">Nama Product</label>
            <input type="text" name="nama" class="form-control" id="">
    </div>
    <div class="form-group">
            <label for="">Harga</label>
            <input type="number" name="harga" class="form-control" id="">
    </div>
    <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="qty" class="form-control" id="">
    </div>
    <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" id="">
    </div>
    <div class="form-group">
            <label for="">Deskripsi</label>
           <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
    </div>
    
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
    if (isset($_POST['save'])){
        $namafoto = $_FILES['image']['name'];
        $location = $_FILES['image']['tmp_name'];
        move_uploaded_file($location, "../foto_product/" .$namafoto);
                $conn->query("INSERT INTO product 
                                SET 
                                nama_product='$_POST[nama]',
                                harga_product='$_POST[harga]',
                                qty = '$_POST[qty]',
                                image_product = '$namafoto',
                                dekripsi_product = '$_POST[deskripsi]'");
                        
        echo '<div class="alert alert-info">Data tersimpan</div>
        <meta http-equiv="refresh" content="1;url=index.php?page=product">';
    }
  

?>
