<?php
session_start();



$koneksi = new mysqli("localhost","root","","sembarang");

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang Kosong'); </script>";
    echo "<script>location='index.php'; </script>";
}

  ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang Belanja</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">
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

<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $ID_BARANG => $jumlah): ?>
				<!-- menampilkan barang yg sedang diperulangkan berdasarkan ID_BARANG -->
				<?php 
				$jupuk = $koneksi->query("SELECT * FROM barang
					WHERE ID_BARANG='$ID_BARANG'");
				$memecah = $jupuk->fetch_assoc();
				$Total = $memecah["HARGA_BARANG"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $memecah["NAMA_BARANG"]; ?></td>
					<td>Rp. <?php echo number_format($memecah["HARGA_BARANG"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($Total); ?></td>
					<td><a href="hapuskeranjang.php?id=<?php echo $ID_BARANG ?>" class="btn btn-danger btn-xs">Hapus</a></td>
				</tr>
				<?php $nomor++; ?> 
				<?php endforeach ?>
			</tbody>
		</table>
		
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
	
</section>
 </body>


 </html>