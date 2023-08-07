<?php  
    // koneksi database 
    // $conn = new mysqli("localhost", "kelas2a04labtrpl", "trpl2a04@2023", "kelas2a04labtrpl_project-cart");
    session_start();
    $conn = new mysqli("localhost", "root", "", "project-cart");
    

    if (!isset($_SESSION['admin'])) {
        # code...
        echo '<script>alert("Anda Harus Login");</script>';
        echo '<script>location="login.php";</script>';
        header("location:login.php?pesan=belum login");
        exit();
    }
    ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-page</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Binary Admin</a> 
            </div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;">  <a href="index.php?page=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a   href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                    <li><a   href="index.php?page=product"><i class="fa fa-bars fa-2x"></i> Product</a></li>
                    <li><a   href="index.php?page=purchase"><i class="fa fa-money fa-2x"></i> Purchase</a></li>
                    <li><a   href="index.php?page=customer"><i class="fa fa-user fa-2x"></i> Customer</a></li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    <?php 
                        if (isset($_GET['page'])) {
                            # code...
                            if ($_GET['page']=='product') {
                                # code...
                                include 'product.php';
                            }
                            elseif($_GET['page']=='purchase'){
                                include 'purchase.php';
                            }
                            else if($_GET['page']=='customer'){
                                include 'customer.php';
                            }
                            else if ($_GET['page']=='detail'){
                                include 'detail.php';
                            }
                            else if($_GET['page']=='tambahproduct'){
                                include 'tambahproduct.php';
                            }
                            else if($_GET['page']=='tambahcustomer'){
                                include 'tambahcustomer.php';
                            }
                            else if($_GET['page']=='hapusproduct'){
                                include 'hapusproduct.php';
                            }
                            else if($_GET['page']=='editproduct'){
                                include 'editproduct.php';
                            }
                            else if($_GET['page']=='logout'){
                                include 'logout.php';
                            }
                            

                        }
                        else {
                            include 'dashboard.php';
                        }
                    
                    
                    
                    ?>
             </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
