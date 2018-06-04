<?php
include('system/config.php');
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <?php
  include_once 'head.php';
  ?>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left"> 
        
      <h2 class="text-center">EDIT Data Kamar</h2>
    <form method="post">
      <div class="form-group">
      			<br><label class="control-label col-sm-2">Nama :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kamar where nama_kamar='".$_GET['id']."'";
                       $sql = mysqli_query ($konek,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' name='nama_kamar' ><br>";
                    }
                ?>
     		 </div>
        </div>	
        <div class="form-group">
      			<br><label class="control-label col-sm-2">Jumlah Kamar :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kamar where jumlah_kamar ='".$_GET['id']."'";
                       $sql = mysqli_query ($konek,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jumlah_kamar' name='jumlah_kamar' value='".$data['jumlah_kamar']."'><br>";
                    }
                ?>
     		 </div>
        </div>

      
        <div class="form-group">
            <br><label class="control-label col-sm-2">Harga :</label>
          <div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kamar where harga ='".$_GET['id']."'";
                       $sql = mysqli_query ($konek,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='harga' name='harga' value='".$data['harga']."'><br>";
                    }
                ?>
         </div>
        </div>
       
       
        <br>
     <button style="margin-left: 160px;" type="submit" name ="submit" class="btn btn-primary">Simpan</button> <a type="submit" name ="submit" class="btn btn-primary" href="room.php">Kembali</a>
         <?php
                    if(isset($_POST['submit'])){
                      $nama_kamar = $_GET['nama_kamar'];
                      $jumlah_kamar = $_POST['jumlah_kamar'];
                      $harga=$_POST['harga'];
                     
                      $query="update kamar SET nama_kamar='".$_POST['nama_kamar']."' WHERE id_kamar='$id'";
                      mysqli_query($koneksi, $query);
                    }

                ?>
        </form><br>
    </div>
  </div>
</div>
<?php

?>


</body>
</html>
