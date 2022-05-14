<h2>Barang</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Barang</th>
			<th>Stok Barang</th>
			<th>Harga Barang</th>
			<th>Foto</th>
			<th>Deskripsi Barang</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
	<?php $jupuk = $koneksi->query("SELECT * FROM barang");?>
	<?php while($memecah=$jupuk->fetch_assoc ()) { ?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $memecah ['NAMA_BARANG']; ?></td>
		<td><?php echo $memecah ['STOK_BARANG']; ?></td>
		<td><?php echo $memecah ['HARGA_BARANG']; ?></td>
		<td><img src="../foto/<?php echo $memecah['FOTO_BARANG']; ?>" width="100px"></td>
		<td><?php echo $memecah ['DESKRIPSI_BARANG']; ?></td>
		<td>
			<a href="index.php?jalan=hapusbarang&id=<?php echo $memecah ['ID_BARANG']; ?>" class="btn-info btn">Hapus</a>
			<br>
			<br>
			<a href="index.php?jalan=ubahbarang&id=<?php echo $memecah['ID_BARANG']; ?>" class="btn-danger btn">Ubah</a>
		</td>
	</tr>
	<?php $nomor++; ?>
	<?php } ?>

	</tbody>
</table>

<a href="index.php?jalan=tambahbarang" class="btn btn-primary">Tambah Data</a>