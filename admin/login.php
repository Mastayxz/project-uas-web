        <!-- conection to database  -->
        <?php
        session_start();
        // $conn = new mysqli("localhost", "kelas2a04labtrpl", "trpl2a04@2023", "kelas2a04labtrpl_project-cart");
        

$conn = new mysqli("localhost", "root", "", "project-cart");

        ?>


        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Free Bootstrap Admin Template : Binary Admin</title>
            <!-- BOOTSTRAP STYLES-->
            <link href="./assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONTAWESOME STYLES-->
            <link href="./assets/css/font-awesome.css" rel="stylesheet" />
                <!-- CUSTOM STYLES-->
            <link href="./assets/css/custom.css" rel="stylesheet" />
            <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        </head>
        <body style="background-color: tomato;">
            <div class="container">
                <div class="row text-center ">
                    <div class="col-md-12">
                        <br /><br />
                        <h2> Binary Admin : Login</h2>
                    
                        <h5>( Login yourself to get access )</h5>
                        <br />
                    </div>
                </div>
                <div class="row ">
                    
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                <strong>   Enter Details To Login </strong>  
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="post">
                                            <br />
                                            <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                                    <input type="text" class="form-control" placeholder="Your Username " name="username" />
                                                </div>
                                                                                    <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                                    <input type="password" class="form-control"  placeholder="Your Password" name="password" />
                                                </div>
                                            <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" /> Remember me
                                                    </label>
                                                    <span class="pull-right">
                                                        <a href="#" >Forget password ? </a> 
                                                    </span>
                                                </div>
                                            
                                            <button class="btn btn-primary" name="login">Login</button>
                                            <hr />
                                            Not register ? <a href="regis.php" >click here </a> 
                                            </form>
                                            <!-- login admin -->
                                            <?php 

                                                if (isset($_POST['login'])) {
                                                    # code...
                                                    $ambil = $conn->query("SELECT * FROM `admin` WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
                                                    $cek = $ambil->num_rows;
                                                    if($cek==1){
                                                        $_SESSION['admin'] = $ambil->fetch_assoc();
                                                        echo '<div class="alert alert-info">Login Berhasil</div>
                                                        <meta http-equiv="refresh" content="1;url=index.php">';
                                                    }
                                                    else {
                                                        echo '<div class="alert alert-danger">Login Gagal</div>
                                                        <meta http-equiv="refresh" content="1;url=login.php">';
                                                    }
                                                }

                                            
                                            ?>
                                    </div>
                                
                                </div>
                            </div>
                </div>
            </div>


            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
            <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- METISMENU SCRIPTS -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- CUSTOM SCRIPTS -->
            <script src="assets/js/custom.js"></script>
        
        </body>
        </html>

            