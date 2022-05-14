<h2>Data Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>

			<td>Nomor</td>

			<td>Nama Pelanggan</td>
			
			<td>Alamat Pelanggan</td>

			<td>Email Pelanggan</td>

			<td>No Telepon Pelanggan</td>

			<td>Aksi</td>
		</tr>
		<tr>
			<?php $nomor=1; ?>
			<?php $jupuk = $koneksi->query("SELECT * FROM pelanggan"); ?>
			<?php while($memecah=$jupuk->fetch_assoc ()) { ?>
			<td><?php echo $nomor;?></td>
			<td><?php echo $memecah['NAMA_PELANGGAN'];?></td>
			<td><?php echo $memecah['ALAMAT_PELANGGAN'];?></td>
			<td><?php echo $memecah['EMAIL_PELANGGAN'];?></td>
			<td><?php echo $memecah['NO_TLP_PELANGGAN'];?></td>
			<td>
			<a href="index.php?jalan=hapuspelanggan&id=<?php echo $memecah ['ID_PELANGGAN']; ?>" class="btn-info btn">Hapus</a>
		</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</thead>
	
</table>
<a href="index.php?jalan=tambahpelanggan <?php echo $memecah ['tambahpelanggan.php']; ?>" class="btn btn-primary">Tambah Pelanggan</a>