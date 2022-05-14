<?php 
session_start();
include 'koneksi.php';
?>
<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$jupuk = $koneksi->query("SELECT * FROM barang WHERE NAMA_BARANG LIKE '%$keyword%' OR DESKRIPSI_BARANG LIKE '%$keyword%'");
while ($memecah = $jupuk->fetch_assoc())
{
	$semuadata[]=$memecah;
}

// echo "<pre>";
// print_r ($semuadata);
// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">
</head>
<body>
<?php include 'navbar.php'; ?>
	<div class="container">
		<h3>Hasil pencarian : <?php echo $keyword ?></h3>
		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Barang <strong><?php echo $keyword ?></strong> Tidak Ada</div>
		<?php endif ?>

		<div class="row">
			<?php foreach ($semuadata as $key => $value): ?>


			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto/<?php echo $value["FOTO_BARANG"]?>" alt="" class="img-responsive">
					<div class="caption">
					<h3><?php echo $value["NAMA_BARANG"]; ?></h3>
					<h5>Rp. <?php echo number_format($value['HARGA_BARANG']); ?></h5>
					<a href="buy.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-primary">Beli</a>
					<a href="detail.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-info">Detail</a>
					</div>
				</div>
			</div>
			
			<?php endforeach ?>
		</div>
		
	</div>

</body>
</html>