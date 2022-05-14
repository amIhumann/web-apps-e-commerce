<?php
session_start();
include 'koneksi.php';

$ID_PEMBELIAN = $_GET['id'];

$jupuk = $koneksi->query("SELECT * FROM pembayaran
    LEFT JOIN pembelian ON pembayaran.ID_PEMBELIAN=pembelian.ID_PEMBELIAN
    WHERE pembelian.ID_PEMBELIAN='$ID_PEMBELIAN' ");

$detbay = $jupuk->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";
if(empty($detbay))
{
    echo "<script>location='riwayat.php';</script>";
    exit();
}


if ($_SESSION["pelanggan"]['ID_PELANGGAN']!=$detbay["ID_PELANGGAN"])
{
    echo "<script>location='riwayat.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lihat Pembayaran</title>
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

<div class="container">
    <h2>Info Pembayaran</h2>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detbay["nama"]; ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detbay["bank"]; ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $detbay["tanggal"]; ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td><?php echo number_format($detbay["jumlah"]); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

    
</body>
</html>