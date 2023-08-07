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

    <div class="row border rounded-3 p-3 bg-white shadow m-auto box-area">

      <!-- Left Box -->
      <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
        <div class="featured-image mb-3">
          <img src="./admin/assets/img/gambar3.png" class="img-fluid rounded-3" style="width: 600px;">
        </div>
        
      </div>

      <!-- Right Box -->
      <div class="col-md-6 right-box">
        <div class="align-items-center">
          <div class="header-text mb-4 text-center">
            <h3 class="text-center mb-5 fw-light fs-5">Sign In</h3>
            
          </div>
          <p>Welcome to Our Store</p>

          <form action="" method="post">
         
            <div class="form-floating mb-3">
              <input name="email" type="email" class="form-control form-control-lg" id="floatingInput" placeholder="name@example.com"required>
              <label for="floatingInput">Email address</label>
            </div>

        <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"required>
                <label for="floatingPassword">Password</label>
              </div>


              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="login">Sign in</button>
              </div>

              <hr class="my-4">
              <a href="regis.php" style="text-decoration: none;"><span style="color: gray;">Don't Have Account?</span> <span>Register</span></a>

        </form>
          <!-- login user-->
          <?php 
                                        if (isset($_POST['login'])) {
                                            # code...
                                            $email = $_POST['email'];
                                            $pass = $_POST['password'];
                                            $ambil = $conn->query("SELECT * FROM customer WHERE email_customer='$email'    AND password_customer='$pass' ");

                                            $cek=$ambil->num_rows;
                                            if ($cek==1) {
                                                # code...
                                                // login
                                                $akun = $ambil->fetch_assoc();
                                                $_SESSION['customer']=$akun;
                                                echo '<script>alert("Login Berhasil ");</script>';
                                                echo '<script>location="checkout.php";</script>';
                                            }
                                            else{
                                                // gagal
                                                echo '<script>alert("Gagal Untuk Login");</script>';
                                                echo '<script>location="login.php";</script>';
                                            }
                                        }
                                    ?>
          </div>
        
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

  