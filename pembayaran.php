<?php 
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>location='login.php'; </script>";
    exit();
}
//mendapatkan id pembelian
$idbuyer = $_GET["id"];
$jupuk = $koneksi->query("SELECT * FROM pembelian WHERE ID_PEMBELIAN='$idbuyer'");
$detailpem = $jupuk->fetch_assoc();

$id_pembeli_beli = $detailpem["ID_PELANGGAN"];
$id_pembeli_login = $_SESSION["pelanggan"]["ID_PELANGGAN"];

if ($id_pembeli_beli !==$id_pembeli_login)
{
    echo "<script>location='riwayat.php'; </script>";
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
   <title>Pembayaran</title>
   <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php
 include 'navbar.php'; 
?>
<div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>kirim bukti pembayaran anda disini</p>
    <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($detailpem["TOTAL_PEMBELIAN"]); ?> </strong></div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Penyetor</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" min="1">
        </div>
        <div class="form-group">
            <label>Foto bukti</label>
            <input type="file" class="form-control" name="bukti">
            <p class="text-danger">foto bukti harus berupa JPG maksimal 2mb</p>
        </div>
        <button class="btn btn-primary" name="send">Kirim</button>
    </form>
</div>

<?php
if (isset($_POST["send"]))
{
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafix = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti, "lihat_pembayaran/$namafix");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    
    $koneksi->query("INSERT INTO pembayaran (ID_PEMBELIAN,nama,bank,jumlah,tanggal,bukti)
    VALUES ('$idbuyer','$nama','$bank','$jumlah','$tanggal','$namafix')
    ");

    $koneksi->query("UPDATE pembelian SET STATUS_PEMBELIAN='lunas'
    WHERE ID_PEMBELIAN='$idbuyer'");
    echo "<script>alert('Pembayaran Berhasil'); </script>";
    echo "<script>location='riwayat.php'; </script>";
}
?>

    
</body>
</html>