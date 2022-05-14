<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multypart/form-data">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="">
	</div> 	
	<div class="form-group">
		<label>Alamat Pelanggan</label>	
		<input type="text" name="alamat" class="form-control" value="">
	</div>
	<div class="form-group">
		<label>Email Pelanggan</label>	
		<input type="text" name="email" class="form-control" value="">
	</div>
	<div class="form-group">
		<label>No Telepon</label>	
		<input type="number" name="telepon" class="form-control" value="">
	</div>
	
	
	<button class="btn btn-primary" name="save">Simpan</button> 	
 </form> 
<?php 
if (isset($_POST['save']))
{
	
	$koneksi->query("INSERT INTO pelanggan (NAMA_PELANGGAN,ALAMAT_PELANGGAN,EMAIL_PELANGGAN,NO_TLP_PELANGGAN)VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[email]','$_POST[telepon]')");
			
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
	    echo "<meta http-equiv='refresh' content='1;url=index.php?jalan=pelanggan'>";	
}
?>
	