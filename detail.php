<?php 
session_start();

include 'koneksi.php';
//mendapatkan ID BARANG
$ID_BARANG = $_GET["id"];
//melakukan query jupuk data
$jupuk = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
$detail = $jupuk->fetch_assoc();

//echo "<pre>";
//print_r($detail);
//echo "</pre>";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <!--navbar-->
    <?php
  include 'navbar.php';
  ?>
   <!--navbar-->


    <section class="kontent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto/<?php echo $detail["FOTO_BARANG"]; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['NAMA_BARANG']; ?></h2>
                    <h4>Rp. <?php echo number_format($detail['HARGA_BARANG']); ?></h4>
                    <h5>STOK: <?php echo $detail['STOK_BARANG'];?></h5>
                    
                    
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['STOK_BARANG']; ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["beli"]))
                    {
                        //mendapatkan jumlah yang diimputkan
                        $jumlah = $_POST["jumlah"];
                        //masukkan di keranjang belanja
                        $_SESSION["keranjang"][$ID_BARANG] = $jumlah;

                        echo "<script>alert('Added $jumlah items'); </script>";
                        echo "<script>location='keranjang.php'; </script>";
                    }
                    ?>
                    
                    <p><?php echo $detail['DESKRIPSI_BARANG']; ?></p>
            </div>
        </div>
    </section>
    
</body>
</html>