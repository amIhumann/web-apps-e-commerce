<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Pendaftaran</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-7">
                                <input type="text" class="form-control" name="nama">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-7">
                                <input type="email" class="form-control" name="email">
                                    </div>
                            </div>            
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                    <div class="col-md-7">
                                <input type="password" class="form-control" name="password">
                                    </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-7">
                                <textarea class="form-control" name="alamat"></textarea>
                                    </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3">No. Telepon</label>
                                    <div class="col-md-7">
                                <input type="number" class="form-control" name="telepon">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-success" name="simpan">Register</button>
                                </div>
                            </div>                                             
                        </form>


                      <?php 

                      if (isset($_POST["simpan"]))
                      {
                          //mengambil data pendaftar
                          $nama = $_POST["nama"];
                          $email = $_POST["email"];
                          $password = $_POST["password"];
                          $alamat = $_POST["alamat"];
                          $telepon = $_POST["telepon"];
                        
                          //mengecek data 
                          $jupuk = $koneksi->query("SELECT * FROM pelanggan WHERE EMAIL_PELANGGAN='$email'");
                          $terdaftar = $jupuk->num_rows;

                          if ($terdaftar==1)
                          {
                              echo "<script>alert('Email telah digunakan'); </script>";
                              echo "<script>location='daftar.php'; </script>";
                          }
                          else
                          {
                              //menambah data pada tabel pelanggan
                                $koneksi->query("INSERT INTO pelanggan 
                                (EMAIL_PELANGGAN,PASSWORD_PELANGGAN,NAMA_PELANGGAN,ALAMAT_PELANGGAN,NO_TLP_PELANGGAN)
                                VALUES ('$email','$password','$nama','$alamat','$telepon')
                                    ");
                                    
                                echo "<script>alert('Pendaftaran Sukses..!'); </script>";
                                echo "<script>location='login.php'; </script>";
                          }

                          
                      }

                      ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>