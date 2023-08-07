<h2>Tambah Data Customer</h2>
<form method="post">
<div class="form-group">
            <label for="">Email</label>
            <input type="email" name="emailCustomer"  class="form-control" placeholder="abc@gmail.com">
    </div>
    <div class="form-group">
            <label for="">nama</label>
           <input type="text" name="namaCustomer"  class="form-control" placeholder="username">
    </div>
    <div class="form-group">
            <label for="">Password</label>
           <input type="password" name="password"  class="form-control" placeholder="*********">
    </div>
    <div class="form-group">
            <label for="">Telepon</label>
           <input type="text" name="telepon"  class="form-control"  placeholder="08089475930">
    </div>
    <button class="btn btn-primary" type="submit" name="save">Simpan</button>
</form>
<?php 
     if (isset($_POST['save'])){
        $conn->query("INSERT INTO customer
                        SET 
                        email_customer='$_POST[emailCustomer]',
                        nama_customer='$_POST[namaCustomer]',
                        password_customer =' $_POST[password]',
                        telepon = '$_POST[telepon]'");  
                        
                echo '<div class="alert alert-info">Data tersimpan</div>
                <meta http-equiv="refresh" content="1;url=index.php?page=customer">';
    }


?>