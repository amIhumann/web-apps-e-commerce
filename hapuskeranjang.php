<?php 
session_start();
$ID_BARANG=$_GET["id"];
unset($_SESSION["keranjang"][$ID_BARANG]);

echo "<script>alert('Removed Items'); </script>";
echo "<script>location='keranjang.php'; </script>;"

?>