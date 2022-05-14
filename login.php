<?php 
session_start();
$koneski = new mysqli("localhost","root","","sembarang")

?>
<!DOCTYPE html>
<html>
<head>
    <title>Chekout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <!--navbar-->
<?php
  include 'navbar.php';
?>
   <!--navbar-->

    
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pembeli</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="@gmail.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="password">
                            </div>
                            <button class="btn btn-success" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
// jika ada tombol simpan(tombol simpan ditekan)
if (isset($_POST["login"]))
{

	$email = $_POST["email"];
	$password = $_POST["password"];
	// lakukan query ngecek akun di tabel pelanggan di db
	$jupuk = $koneski->query("SELECT * FROM pelanggan
		WHERE EMAIL_PELANGGAN='$email' AND PASSWORD_PELANGGAN='$password'");

	// ngitung akun yang terambil
	$akunyangcocok = $jupuk->num_rows;

	// jika 1 akun yang cocok, maka dilogikan
	if ($akunyangcocok==1)
	{
		// anda telah login
		// mendapatkan akun dalam bentuk array
		$akun = $jupuk->fetch_assoc();
		// simpan di session pelanggan
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('anda telah login');</script>";
		//jk telah belanja
		if  (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='riwayat.php';</script>";
		}

	}
	else
	{
		// anda gagal login
		echo "<script>alert('anda gagal login,mohon periksa kembali');</script>";
		echo "<script>location='login.php';</script>";
	}

}
?>

</body>
</html>