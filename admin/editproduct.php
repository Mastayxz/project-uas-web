<h2>Edit Data Product</h2>

<?php 

$ambil = $conn->query("SELECT * FROM product WHERE id_product='$_GET[id]'");
$tampil = $ambil->fetch_assoc();

echo "<pre>";
print_r($tampil);
echo "</pre>";

?>
<form  method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="">Nama Product</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $tampil['nama_product'];?>">
    </div>
    <div class="form-group">
            <label for="">Harga</label>
            <input type="number" name="harga" class="form-control" value="<?php echo $tampil['harga_product']; ?>">
    </div>
    <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="qty" class="form-control" value="<?php echo $tampil['qty']; ?>">
    </div>
         <div class="form-group">
        <img src="../foto_product/<?php echo $tampil['image_product']; ?>" width="100">
        <input type="file" name="image" id="">
    </div>
    <div class="form-group">
            <label for="">Deskripsi</label>
           <textarea class="form-control" name="deskripsi" cols="30" rows="10"  >
           <?php echo $tampil['dekripsi_product']; ?>
           </textarea>
    </div>
   
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])){
        $namafoto = $_FILES['image']['name'];
        $location = $_FILES['image']['tmp_name'];

        if(!empty($namafoto)){
            move_uploaded_file($location, "../foto_product/" .$namafoto);
            $conn->query("UPDATE product 
            SET 
            nama_product='$_POST[nama]',
            harga_product='$_POST[harga]',
            qty = '$_POST[qty]',
            image_product = '$namafoto',
            dekripsi_product = '$_POST[deskripsi]' 
            WHERE id_product='$_GET[id]' ");
        }
        else {
            $conn->query("UPDATE product 
            SET 
            nama_product='$_POST[nama]',
            harga_product='$_POST[harga]',
            qty = '$_POST[qty]',
            dekripsi_product = '$_POST[deskripsi]' 
            WHERE id_product='$_GET[id]' ");
        }
        echo  '<script>alert("Data product telah diubah");</script>';
            echo '<script>location="index.php?page=product";</script>';
    
    }
        
        
?>