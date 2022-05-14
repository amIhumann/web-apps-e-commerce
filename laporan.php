<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
     <!--navbar-->
<?php
  include 'navbar.php';
?>
   <!--navbar-->


<section class="konten">
        <div class="container">
            
                <!--Nota-->
                <h2>Detail Pembelian</h2>
                <hr>
<?php 
 $jupuk= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
 ON pembelian.ID_PELANGGAN=pelanggan.ID_PELANGGAN 
 WHERE pembelian.ID_PEMBELIAN='$_GET[id]'");
 $detail = $jupuk->fetch_assoc();
?>

<?php 
$idpembeliyangbeli = $detail["ID_PELANGGAN"];
$idpembeliyanglogin = $_SESSION["pelanggan"]["ID_PELANGGAN"];

if ($idpembeliyangbeli!==$idpembeliyanglogin)
{
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>
 <!--<pre><?php //print_r($detail); ?></pre>-->
 

 <div class="row">
	<div class="form-group">
		<div class="col-md-4">
		<label>Pembeli</label>
			<input type="text" readonly value="Nama: <?php echo $detail['NAMA_PELANGGAN'];?>" class="form-control">
			<input type="text" readonly value="Telepon: <?php echo $detail['NO_TLP_PELANGGAN'];?>" class="form-control">
			<input type="text" readonly value="Email: <?php echo $detail['EMAIL_PELANGGAN'];?>" class="form-control">
		</div>
		<div class="col-md-4">
		<label>Pengiriman</label>
			<input type="text" readonly value="Nama kota: <?php echo $detail['NAMA_KOTA'];?>" class="form-control">
			<input type="text" readonly value="Tarif: Rp. <?php echo number_format($detail['TARIF']);?>" class="form-control">
			<textarea  class="form-control" readonly>Alamat: <?php echo $detail['ALAMAT_PENGIRIMAN']; ?></textarea>
		</div>
		<div class="col-md-4">
		<label>Pembelian</label>
			<input type="text" readonly value="Tanggal: <?php echo $detail['TANGGAL_PEMBELIAN'];?>" class="form-control">
			<input type="text" readonly value="Total: Rp. <?php echo number_format($detail['TOTAL_PEMBELIAN']);?>" class="form-control">
			<input type="text" readonly value="Status: <?php echo $detail['STATUS_PEMBELIAN'];?>" class="form-control">
		</div>
	</div>
 </div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama barang</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Total</th>
            
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1;?>
 		<?php $jupuk=$koneksi->query("SELECT * FROM pembelian_barang WHERE ID_PEMBELIAN='$_GET[id]'");?>
 		<?php while ($show= $jupuk->fetch_assoc()) { ?>
 		
 		<tr>
 			<td><?php echo $nomor ; ?></td>
 			<td><?php echo $show['nama']; ?></td>
 			<td>Rp. <?php echo number_format($show['harga']); ?></td>
 			<td><?php echo $show['jumlah']; ?></td>
 			<td>Rp. <?php echo number_format($show['total']); ?></td> 
         </tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>

<div class="row">
        <div class="col-md-7">
            <div class="alert alert-info">
                <p>
                    Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['TOTAL_PEMBELIAN']); ?> 
                    ke <br>
                    <strong>BANK MANDIRI xxx-xxxxx-xxxx AN. Bang Dayat</strong>
                </p>
            </div>
        </div>
</div>




        </div>
</section>
    
</body>
</html>