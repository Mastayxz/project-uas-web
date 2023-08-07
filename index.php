<?php 
session_start();
// $conn = new mysqli("localhost", "root", "", "project-cart");
include "conection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="./admin/assets/css/design.css">
    <?php include "./admin/assets/link.php"; ?>
    <title>Binary Shoping</title>
</head>
<body class="bg-light">

<!-- navbar -->
<nav class="navbar navbar-expand-lg  shadow bg-primary" >
  <div class="container">
    <a class="navbar-brand fw-bold text-warning logo-brand" href="#">Suka-suka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mx-3 menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./checkout.php">Checkout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <ul class="dropdown-menu">
            <li><?php if (isset($_SESSION["customer"])):?>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                
                <?php else:?>
                    <a href="./login.php" class="dropdown-item">Login</a>
                <?php endif?></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
        





<!-- content -->
<section class="carosel">
    <div class="container-fluid ">
        <div class="row mt-5 carousel-img shadow ">
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner rounded-4 ">
    <div class="carousel-item active  ">
   
      <img src="./foto_product/iStock-1090128792.png" class="d-block w-100 " alt="...">
      <div class="carousel-caption d-none d-md-block text-dark">
        <h2>Third slide label</h2>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="./foto_product/iStock-1090128792.png" class="d-block w-100 " alt="...">
    <div class="carousel-caption d-none d-md-block text-dark">
        <h2>Third slide label</h2>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="./foto_product/rekomendasi-toko-peralatan-rumah-tangga-terlengkap-di-solo.jpg" class="d-block w-100 " alt="...">
    <div class="carousel-caption d-none d-md-block text-dark">
        <h2>Third slide label</h2>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 </div>
 </div>

</section>
<div class="container mt-5">
  <h4 class="text-center text-dark">Silahkan Temukan Pralatan Yang Anda Ingnikan😊</h4>
<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
      </div>

<section class="kontent ">
    <div class="container-fluid mt-5" >
        <div class="row">
            <?php
                $ambil = $conn->query("SELECT * FROM product");
                while ($tampil=$ambil->fetch_assoc()) {
             ?>
            <div class="col-md-3 col-sm-3 rounded-4 ">
                <div class="card  card-style mt-3 shadow" style="width: 23rem;  ">
                    <img src="./foto_product/<?php echo $tampil['image_product']; ?>" alt=""  class="card-img   ">
                    <div class="card-body caption">
                        <h5 class="card-title"><?php echo $tampil['nama_product']; ?></h5>
                        <h6 class="card-text">Rp. <?php echo number_format($tampil['harga_product']) ; ?></h6>
                        <a href="detailuser.php?id=<?php echo $tampil['id_product']; ?>" class="btn btn-primary rounded-3">Beli</a>
                       
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>


    </div>
</section>

<section class="footer">
<div class="footer d-flex col-12 bg-dark mt-4">
        <div class="container col-11 d-flex">
            <div class="Description mt-3  ">
                <H3 class="text-warning ">SukaSuka</H3>
                <p class="col-5 text-white">SukaSuka adalah E-Commerce No.1 di Indonesia, menjual segala kebutuhan yang
                    anda inginkan. </p>
                <div class="button">
                    <button type="button" class="btn btn-footer btn-outline-primary text-white mb-3" id="#">Download di
                        IOS</button> </br>
                    <button type="button" class="btn btn-footer btn-outline-primary text-white ">Download di
                        Android</button>
                </div>
            </div>
            <div class="link mt-3">
                <h3 class="text-white">Tautan berguna</h3>
                <div class="">
                    <a href="#" class="">Brosur Kami</a> </br>
                    <a href="#" class="">Layanan Pelanggan</a> </br>
                    <a href="#" class="">Hubungi Kami</a> </br>
                    <a href="#" class="">FAQ</a> </br>
                </div>

                <div class=" text-white">
                    <a href=""><i class="fa-brands fa-instagram icon"></i></a>
                    <a href=""><i class="fa-brands fa-twitteri"></i></a>
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>

                </div>
            </div>

        </div>

    </div>
</section>

</body>
<script src="admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="admin/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="admin/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="admin/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>