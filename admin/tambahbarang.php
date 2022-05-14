s<h2>Tambah Barang</h2>

<form method="post" enctype="multypart/form-data">
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control">
	</div> 	
	<div class="form-group">
		<label>Stok Barang</label>	
		<input type="number" name="stok" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>	
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">

		<img src="../foto/<?php echo $memecah ['FOTO_BARANG']?>" width= "200">   
		
	</div> 	
	<div>
		<label>Tambah Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>  
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10">
			
		</textarea>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button> 	
 </form> 
<?php 
if (isset($_POST['save']))
{
	$nama=$_FILES['foto']['name'];
	$lokasi=$FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi,"../foto/".$nama);
	$koneksi->query("INSERT INTO barang (NAMA_BARANG,STOK_BARANG,HARGA_BARANG,FOTO_BARANG,DESKRIPSI_BARANG)VALUES ('$_POST[nama]','$_POST[stok]','$_POST[harga]','$_POST[foto]','$_POST[deskripsi]')");
			
		echo "<div class='alert alert-info'>Data Tersimpan</div>";
	    echo "<meta http-equiv='refresh' content='1;url=index.php?jalan=barang'>";	
}
?>