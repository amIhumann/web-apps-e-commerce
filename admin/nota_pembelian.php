<?php

$semuadata=array();

$tgl_mulai="-";
$tgl_selesai="-";


if (isset($_POST["kirim"]))
{
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"]; 
    $jupuk = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.ID_PELANGGAN=pelanggan.ID_PELANGGAN 
    WHERE TANGGAL_PEMBELIAN BETWEEN '$tgl_mulai' AND '$tgl_selesai' 
    ");

    while($memecah = $jupuk->fetch_assoc())
    {
        $semuadata[]=$memecah;
    }

    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";

}

?>

<h2>Laporan Pembelian dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label><br>
                <button class="btn btn-primary" name="kirim">Cek</button>
            </div>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pembeli</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>        
        </tr>
    </thead>
    <tbody>
    <?php $total=0; ?>
    <?php foreach ($semuadata as $key => $value): ?>
    <?php $total+=$value['TOTAL_PEMBELIAN'] ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["NAMA_PELANGGAN"]; ?></td>
            <td><?php echo $value["TANGGAL_PEMBELIAN"]; ?></td>
            <td><?php echo number_format($value["TOTAL_PEMBELIAN"]); ?></td>
            <td><?php echo $value["STATUS_PEMBELIAN"]; ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
        <th colspan="3">Total</th>
        <th><?php echo number_format($total); ?></th>
        <th></th>
    </tfoot>
</table>
