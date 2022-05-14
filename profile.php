<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css"></link>
<link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">

</head>

<body>
    <!--navbar-->
<style>
    body {
        background: url(foto/bungamawar.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

    <?php 
    include 'navbar.php';

    ?>
   
   <div class="carousel-item">
            </div>
        <b>
            <center>
                <p>
                    <font size=7>
                        <font color=white>
                            <font face="Arial">Selamat Datang Di Mawar Butik</font><b>
            </center>
            </p></font>
            </font>
            </font>
            <marquee>
                <br>
                <h1>
                    <br><br><br>
                    <font color=white>Klik Sekarang untuk Memesan</font>
                </h1>
            </marquee>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p style="color: white">Contact</p>
                    <a href="https://www.instagram.com/a_a_blast" class="btn btn-warning" style="color: white"><i class="fab fa-instagram"> Instagram</i></a>
                    <a href="https://bit.ly/3nTr0R8" class="btn btn-success" style="color: white"><i class="fab fa-whatsapp"> Whatsapp</i></a>
                    <a href="https://m.facebook.com/dayat.senju" class="btn btn-primary" style="color: white"> <i class="fab fa-facebook-square"> Facebook</i></a>
                </div>
            </div>
    </body>
 

</html>