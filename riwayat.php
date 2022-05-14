<?php 
session_start();
include 'koneksi.php';


// echo "<pre>";
// print_r($memecah);
// echo "</pre>";

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>location='login.php'; </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mawar</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    
</head>
<body>
    <style>
    body {
        background: url(foto/background4.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
<?php
 include 'navbar.php'; 
?>

<section class="content">
    <div class="container">
        <h3>Riwayat Pembelian: <strong> <?php echo $_SESSION["pelanggan"]["NAMA_PELANGGAN"] ?></strong></h3>
        <hr>
        <table class="table table-bordered">
            <thead class="table bg-secondary">
                <tr>
                    <th>NO</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor=1;
                $ID_PELANGGAN = $_SESSION["pelanggan"]['ID_PELANGGAN'];
                $jupuk = $koneksi->query("SELECT * FROM pembelian WHERE ID_PELANGGAN='$ID_PELANGGAN'");
                while($memecah = $jupuk->fetch_assoc()) {

                ?>
                <tr>
                <td><?php echo $nomor; ?></td>
                    <td><?php echo $memecah["TANGGAL_PEMBELIAN"]; ?></td>
                    <td>
                        <?php echo $memecah["STATUS_PEMBELIAN"]; ?>
                        <br>
                        <?php if (!empty($memecah["RESI_PENGIRIMAN"])): ?>
                        Resi: <?php echo $memecah["RESI_PENGIRIMAN"]; ?>
                        <?php endif ?>
                    </td>
                    <td><?php echo number_format($memecah["TOTAL_PEMBELIAN"]) ?></td>
                    <td>
                        <a href="laporan.php?id=<?php echo $memecah["ID_PEMBELIAN"] ?>" class="btn btn-info">Laporan</a>
                        <?php if ($memecah['STATUS_PEMBELIAN']=="pending"): ?>
                        <a href="pembayaran.php?id=<?php echo $memecah["ID_PEMBELIAN"] ?>" class="btn btn-danger">Pembayaran</a>
                        <?php else: ?>
                            <a href="lihat_pembayaran.php?id=<?php echo $memecah["ID_PEMBELIAN"] ?>" class="btn btn-success">Lihat Pembayaran
                        </a>
                            <?php endif ?>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
                </tbody>
        </table>
    </div>
</section>
    
</body>
</html>