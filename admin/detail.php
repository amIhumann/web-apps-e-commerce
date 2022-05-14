<h2>Detail Pembelian</h2>
<?php 
 $jupuk = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan WHERE pembelian.ID_PEMBELIAN='$_GET[id]'");
 $detail = $jupuk->fetch_assoc();
 ?>
 <pre><?php print_r($detail) ?></pre>

 <strong><?php echo $detail['NAMA_PELANGGAN'];?></strong>
 <p>
 	Telepon Pelanggan:<?php echo $detail['NO_TLP_PELANGGAN']; ?><br>
 	Email Pelanggan:<?php echo $detail['EMAIL_PELANGGAN']; ?>
 </p>
 <p>
 	Tanggal Pembelian:<?php echo $detail['TANGGAL_PEMBELIAN'];?><br>
 	Total Pembelian:<?php echo $detail['TOTAL_PEMBELIAN'];?>
 </p>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>no</th>
 			<th>nama barang</th>
 			<th>harga</th>
 			<th>jumlah</th>
 			<td>sub total</td>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1;?>
 		<?php $jupuk=$koneksi->query("SELECT * FROM pembelian_barang JOIN barang ON pembelian_barang.ID_BARANG=barang.ID_BARANG 
 			WHERE pembelian_barang.ID_PEMBELIAN='$_GET[id]'");?>
 		<?php while ($memecah= $jupuk->fetch_assoc()) { ?>
 		
 		<tr>
 			<th><?php echo $nomor ; ?></th>
 			<td><?php echo $memecah['NAMA_BARANG']; ?></td>
 			<td><?php echo $memecah['HARGA_BARANG']; ?></td>
 			<td><?php echo $memecah['jumlah']; ?></td>
 			<td>
 				<?php echo $memecah['HARGA_BARANG']*$memecah['jumlah'];?>
 			</td> 
 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>