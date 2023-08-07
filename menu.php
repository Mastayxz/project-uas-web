<?php 

 include "conection.php";
?>
<nav class="navbar navbar-expand-lg  shadow bg-primary" >
  <div class="container">
    <a class="navbar-brand fw-bold text-warning " href="#">Suka-Suka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mx-3 menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
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