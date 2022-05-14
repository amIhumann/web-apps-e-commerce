<?php 

$jupuk = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$_GET[id]'");
$memecah = $jupuk->fetch_assoc();
$fotobarang = $memecah['FOTO_BARANG'];
if (file_exists("../foto/$fotobarang"))
{
    unlink("../foto/$fotobarang");
}


$koneksi->query("DELETE FROM  barang WHERE ID_BARANG='$_GET[id]'");

echo "<script>alert('Barang Terhapus');</script>";
echo "<script>location='index.php?jalan=barang';</script>";

?>