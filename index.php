<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","sembarang");
?>



<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">
</head>
<body>
    <style>
    body {
        background: url(foto/background3.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
   <?php 
    include 'navbar.php';

    ?>


<!--konten-->
<section class="konten">
    <div class="container">
        <h1 style="color: white">Aneka Pakaian</h1>
        <br>
            <div class="row">


                <?php $jupuk = $koneksi->query("SELECT * FROM barang") ; ?>
                <?php while($perbarang = $jupuk->fetch_assoc()){ ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto/<?php echo $perbarang['FOTO_BARANG']; ?>" alt="">
                            <div class="caption">
                                <h4><?php echo $perbarang['NAMA_BARANG']; ?> </h4>
                                <h5><?php echo number_format($perbarang['HARGA_BARANG']); ?> </h5>
                                <a href="buy.php?id=<?php echo $perbarang['ID_BARANG']; ?> " class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-default">Detail</a>
                                <p class="card-footer"><?php echo $perbarang['DESKRIPSI_BARANG']?></p>
                            </div>
                    </div>
                </div>

                <?php } ?>


            </div>
    </div>
</section>
<br>

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