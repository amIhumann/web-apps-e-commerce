<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('login dahulu'); </script>";
    echo "<script>location='login.php'; </script>";
}
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang Kosong'); </script>";
    echo "<script>location='index.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">
</head>
<body>
    <style>
    body {
        background: url(foto/background4.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
    <?php 
    include 'navbar.php';

    ?>
<section class="konten">
    <div class="container">
        <h1>Keranjang</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
                <tbody>
                    <?php $nomor=1;?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $ID_BARANG => $jumlah): ?>
                <!--menampilkan barang dan diperulangkan berdasarkan id-->
                    <?php
                        $jupuk = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
                        $memecah = $jupuk->fetch_assoc();
                        $Total = $memecah['HARGA_BARANG']*$jumlah;
                    ?>

                   <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $memecah['NAMA_BARANG']; ?></td>
                        <td>Rp. <?php echo number_format($memecah['HARGA_BARANG']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($Total); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$Total; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                        <tr>
                            <th colspan="4">Total Belanja</th>
                            <th>Rp. <?php echo number_format($totalbelanja); ?> </th>
                        </tr>
                </tfoot>
        </table>
       
       <form method="post">
           
            <div class="row">
            
                    <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['NAMA_PELANGGAN'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['NO_TLP_PELANGGAN'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="ID_ONGKIR">
                            <option value="">Kota</option>
                            <?php 
                            $jupuk = $koneksi->query("SELECT * FROM ongkir");
                            while($ongkir = $jupuk->fetch_assoc()) {
                           
                            ?>
                             <option value="<?php echo $ongkir['ID_ONGKIR']; ?> ">
                                <?php echo $ongkir['NAMA_KOTA']; ?>
                               Rp. <?php echo number_format($ongkir['TARIF_KOTA']); ?>  
                             </option>

                            <?php }?>
                        </select>
                    </div>
            </div>
                    <div class="form-group">
                            <label>Alamat Pengiriman</label>
                            <textarea class="form-control" name="ALAMAT_PENGIRIMAN" placeholder="alamat lengkap pengiriman(termasuk kode pos)">
                            </textarea>
                    </div>
            <button class="btn btn-primary" name="chekout">Chekout</button>
       </form>

       <?php 
        if (isset($_POST["chekout"]))
        {
            $ID_PELANGGAN = $_SESSION["pelanggan"]["ID_PELANGGAN"];
            $ID_ONGKIR = $_POST["ID_ONGKIR"];
            $TANGGAL_PEMBELIAN = date("Y-m-d");
            $ALAMAT_PENGIRIMAN = $_POST["ALAMAT_PENGIRIMAN"];

            $jupuk = $koneksi->query("SELECT * FROM ongkir WHERE ID_ONGKIR='$ID_ONGKIR'");
            $arrayongkir = $jupuk->fetch_assoc();
            $NAMA_KOTA = $arrayongkir['NAMA_KOTA'];
            $TARIF = $arrayongkir['TARIF_KOTA'];

            $TOTAL_PEMBELIAN = $totalbelanja + $TARIF;

            //menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO pembelian (
                ID_PELANGGAN,ID_ONGKIR,TANGGAL_PEMBELIAN,TOTAL_PEMBELIAN,NAMA_KOTA,TARIF,ALAMAT_PENGIRIMAN)
                VALUES ('$ID_PELANGGAN','$ID_ONGKIR','$TANGGAL_PEMBELIAN','$TOTAL_PEMBELIAN','$NAMA_KOTA','$TARIF','$ALAMAT_PENGIRIMAN')"
                );

            //mendapatkan id pembelian
            $ID_PEMBELIAN_V2 = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $ID_BARANG => $jumlah)
            {
                //mendapatkan data barang sesuai id barang
               $jupuk=$koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
               $perbarang = $jupuk->fetch_assoc();
               
               $nama = $perbarang['NAMA_BARANG'];
               $harga = $perbarang['HARGA_BARANG'];

               $Total = $perbarang['HARGA_BARANG']*$jumlah;

               $koneksi->query("INSERT INTO pembelian_barang (ID_PEMBELIAN,ID_BARANG,nama,harga,total,jumlah)
                VALUES ('$ID_PEMBELIAN_V2','$ID_BARANG','$nama','$harga','$Total','$jumlah') "
                );
                $koneksi->query("UPDATE barang SET STOK_BARANG=STOK_BARANG - $jumlah 
                WHERE ID_BARANG='$ID_BARANG'");

            }

            //menghapus bekas pembelian
            unset($_SESSION["keranjang"]);

            //halaman laporan
            echo "<script>alert('Pembelian berhasil'); </script>";
            echo "<script>location='riwayat.php?id=$ID_PEMBELIAN_V2'; </script>";


        }
       ?>

    </div>
</section>

    
</body>
</html>