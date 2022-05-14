<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","sembarang");

//logino sek
if  (!isset($_SESSION['admin']))
{
    echo "<script>alert ('kape nandi ? Login sek!');</script>";
    echo "<script>location='login.php';</script>";
    header('location: login.php');
    exit();
 }
 ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
            <center><h3 style="color: white">administrasi</h3></center>
            
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>

                    
                    <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Home</a></li>     
                    <li><a href="index.php?jalan=barang"><i class="fa fa-dashboard fa-3x"></i> Barang</a></li>
                    <li><a href="index.php?jalan=pembelian"><i class="fa fa-dashboard fa-3x"></i> Pembelian</a></li>
                    <li><a href="index.php?jalan=pelanggan"><i class="fa fa-dashboard fa-3x"></i> Pelanggan</a></li>
                    <li><a href="index.php?jalan=notapembelian"><i class="fa fa-dashboard fa-3x"></i> Lapor Pembelian</a></li>
                    <li><a href="index.php?jalan=logout"><i class="fa fa-dashboard fa-3x"></i> Logout</a></li>
                </ul>

            </li>
        </ul>
    </li>  
    <li  >

    </li>   
</ul>

</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <?php 

        if (isset($_GET['jalan']))
        {
            if ($_GET['jalan']=="barang")
            {
                include 'barang.php';
            }
            elseif ($_GET['jalan']=="pembelian")
            {
                include 'pembelian.php';
            }
            elseif ($_GET['jalan']=="pelanggan")
            {
                include 'pelanggan.php';
            }   
            elseif ($_GET['jalan']=="detail") 
            {
                include 'detail.php';
            }
            elseif ($_GET['jalan']=="hapuspelanggan")
            {
                include 'hapuspelanggan.php';
            }
            elseif ($_GET['jalan']=="hapusbarang")
            {
                include 'hapusbarang.php';
            }
            elseif ($_GET['jalan']=="ubahbarang")
             {
                include 'ubahbarang.php';
            }
            elseif ($_GET['jalan']=="tambahbarang")
             {
                include 'tambahbarang.php';
            }
            elseif ($_GET['jalan']=="tambahpelanggan")
             {
                include 'tambahpelanggan.php';
            }
            elseif ($_GET['jalan']=="tambahpembelian")
             {
                include 'tambahpembelian.php';
            }
            elseif ($_GET['jalan']=="notapembelian")
             {
                include 'nota_pembelian.php';
            }
            elseif ($_GET['jalan']=="logout")
             {
                include 'logout.php';
            }
        }

        else 
        {
            include 'home.php';
        }

        ?>
        



            </div>              
            <!-- /. ROW  -->
            <hr />



        </div>
    </div>
</div>


<!-- /. ROW  -->


<!-- /. ROW  -->




</body>
</html>
