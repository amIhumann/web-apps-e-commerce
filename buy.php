<?php
session_start();
// mendapatkan ID_BARANG dari url
$ID_BARANG = $_GET['id'];


// jk sudah ada barang itu dikeranjang, maka barang itu jumlahnya di +1
if(isset($_SESSION['keranjang'][$ID_BARANG])) 
{
	$_SESSION['keranjang'][$ID_BARANG]+=1;
}
//selainitu (blm ada di keranjang),maka barang itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$ID_BARANG] = 1;
}


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//larikan ke halaman keranjang
echo "<script>alert('barang telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>