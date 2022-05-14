<h2>Ubah Barang</h2>
<?php
$jupuk=$koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$_GET[id]'");
$memecah= $jupuk->fetch_assoc();

echo "<pre>";
print_r($memecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $memecah['NAMA_BARANG']; ?>">
		
	</div>
    <div class="form-group">
    	<label>Harga</label>
    	<input type="number" class="form-control" name="harga" value="<?php echo $memecah['HARGA_BARANG']; ?>">
    	
    </div>
    <div class="form-group">
    	<label>Stok Barang</label>
    	<input type="number" class="form-control" name="stok" value="<?php echo $memecah['STOK_BARANG']; ?>">

    </div>
    <div class="form-group">
    	<img src="../foto/<?php echo $memecah['FOTO_BARANG'] ?>" width="200">

    </div>
    <div class="form-group">
    	<label>Ganti Foto</label>
    	<input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
    	<label>Deskripsi</label>
    	<textarea name="deskripsi" class="form-control" rows="10">
    		<?php echo $memecah['DESKRIPSI_BARANG']; ?>
    	</textarea>
    </div>
    <button class="btn btn-primary" name="ubah">ubah</button>
</form>

<?php
	if (isset($_POST['ubah']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	// jk foto dirubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto/$namafoto");

		$koneksi->query("UPDATE barang SET NAMA_BARANG='$_POST[nama]',STOK_BARANG='$_POST[stok]',HARGA_BARANG='$_POST[harga]',FOTO_BARANG='$namafoto',DESKRIPSI_BARANG='$_POST[deskripsi]' WHERE ID_BARANG='$_GET[id]'");
	}
	  else
	{
		$koneksi->query("UPDATE barang SET NAMA_BARANG='$_POST[nama]',STOK_BARANG='$_POST[stok]',HARGA_BARANG='$_POST[harga]',DESKRIPSI_BARANG='$_POST[deskripsi]' WHERE ID_BARANG='$_GET[id]' ");
	}
	echo "<script>alert('data barang telah diubah');</script>";
	echo "<script>location='index.php?jalan=barang';</script>";
}
 ?>