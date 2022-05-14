<h2>Tambah Barang</h2>

<form method="post" enctype="multypart/form-data">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="">
	</div> 	
	<div class="form-group">
		<label>Tanggal Beli</label>	
		<input type="date" name="tanggal" class="form-control" value="">
	</div>
	<div class="form-group">
		<label>Total Beli</label>	
		<input type="number" name="harga" class="form-control" value="">
	</div>
	
	<a href="" class="btn btn-primary" name="save">Simpan</a> 	
 </form> 
<?php 
if (isset($_POST['save']))
{
	
	$koneksi->query("INSERT  INTO pembelian JOIN pelanggan ON pembelian.ID_PELANGGAN=pelanggan.ID_PELANGGAN WHERE pembelian.ID_PELANGGAN= '$_GET[id]'(NAMA_PELANGGAN,TANGGAL_PEMBELIAN,TOTAL_HARGAs)"); 
			
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
	    echo "<meta http-equiv='refresh' content='1;url=index.php?jalan=pelanggan'>";	
}
?>
