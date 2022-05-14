<h2>Data Pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<td>Nomor</td>
			<td>Nama Pelanggan</td>
			<td>Tanggal Beli</td>
			<td>Total Beli</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
			<?php $nomor=1; ?>
			<?php $jupuk=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.ID_PELANGGAN=pelanggan.ID_PELANGGAN"); ?>
			<?php while($memecah = $jupuk->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $memecah['NAMA_PELANGGAN'] ; ?></td>
			<td><?php echo $memecah['TANGGAL_PEMBELIAN']; ?></td>
			<td>Rp. <?php echo number_format($memecah['TOTAL_PEMBELIAN']); ?></td>
			<td><?php echo $memecah['STATUS_PEMBELIAN']; ?></td>
            <td>
            	<a href="index.php?jalan=detail&id=<?php echo $memecah['ID_PEMBELIAN']; ?>" class="btn btn-info">Detail</a>
            </td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>s
</table>

<a href="index.php?jalan=tambahpembelian <?php echo $memecah['tambahpembelian.php']; ?>" class="btn btn-primary">Tambah Data Pembelian</a>