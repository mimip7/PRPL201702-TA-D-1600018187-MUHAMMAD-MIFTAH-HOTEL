<?php
include('system/config.php');
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <script src="js/validator.js"></script>
    
    
</head>
<body>
 <?php
  include_once 'head.php';
  ?>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left" style="margin-left: 6%;">
        <h2 class="text-center">Tambah Data Kamar</h2>
      <form class="form-horizontal" method="post" data-toggle="validator" role="form" action="tambahkamar.php">
          
          <div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="nama">Nama Kamar</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required name="nama_kamar" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div>
                
			</div>
			<div class="form-group has-feedback">
				<label class="control-label col-sm-2"  for="nama">Jumlah:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required name="jumlah_kamar" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div>
			</div>
      <div class="form-group has-feedback">
        <label class="control-label col-sm-2"  for="nama">Ukuran :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" required name="size" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="control-label col-sm-2"  for="nama">Daya Tampung:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" required name="occupancy" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
        </div>
      </div>
			<div class="form-group has-feedback">
        <label class="control-label col-sm-2"  for="nama">Harga:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" required name="harga" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
        </div>
      </div>
          
         
        
          <button type="submit" name ="submit" class="btn btn-primary" style="margin-left: 17%">Simpan</button><br>
          <?php		
                    if(isset($_POST['submit'])){
                    
                    $nama_kamar = $_POST['nama_kamar'];
                    $jumlah_kamar   = $_POST['jumlah_kamar'];
                    $size   = $_POST['size'];
                    $occupancy  = $_POST['occupancy'];
                    $harga  = $_POST['harga'];
          
                    $query="INSERT INTO kamar SET nama_kamar='$nama_kamar',jumlah_kamar='$jumlah_kamar',size='$size',occupancy='$occupancy',harga='$harga'";
                   $result=mysqli_query($konek, $query);
                        if($result){
                            echo '<script language="javascript">';
                            echo 'alert("Data Berhasil disimpan")';
                            echo '</script>';
                            }
                    }
                ?>
		</form><br>
    </div>
  </div>
</div>


</body>
</html>
