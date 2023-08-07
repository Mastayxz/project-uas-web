<!-- conection to database  -->
<?php
session_start();
include "conection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(to right, rgb(82, 82, 82), rgb(2, 2, 58));">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
  
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama" required>
                    <label for="floatingInput">Username</label>
                  </div>

              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"required>
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"required>
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input name="telepon" type="number" class="form-control" id="floatingInput" placeholder="Your Phone Number"required>
                <label for="floatingInput">Telephone Number</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="daftar">Sign Up</button>
              </div>

              <hr class="my-4">
              <a href="login.php" style="text-decoration: none;">Back to login</a>
              
            </form>

            <!-- regis user  -->
            <?php 
                                        if (isset($_POST['daftar'])){
                                            $email = $_POST['email'];
                                            $nama = $_POST['nama'];
                                            $password= $_POST['password'];
                                            $telepon = $_POST['telepon'];

                                            $ambil = $conn->query("SELECT * FROM customer WHERE email_customer = '$_POST[email]'");
                                            $cek = $ambil->num_rows;
                                            if ($cek==1) {
                                                # code..
                                                echo '<script>alert("gagal untuk daftar😡");</script>';
                                                echo '<script>location="regis.php";</script>';
                                            }
                                            else{
                                                $conn->query("INSERT INTO `customer`( `email_customer`, `nama_customer`, `password_customer`, `telepon`) VALUES ('$email','$nama','$password','$telepon')");

                                                echo '<script>alert(" daftar berhasil, silahkan login");</script>';
                                                echo '<script>location="login.php";</script>';
                                            }
                                        }
                                      

                                       
                                    ?>
          </div>
        </div>
      
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>


</html>





