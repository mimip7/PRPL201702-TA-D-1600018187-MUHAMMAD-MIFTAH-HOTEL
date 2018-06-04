

<?php

include_once 'system/config.php';

$nama = $_POST["nama"];
$email = $_POST["email"];
$alamat = $_POST["alamat"];
$pesan= $_POST["pesan"];

$sql = "INSERT INTO kontak(nama, email, alamat, pesan) VALUES ('$nama','$email','$alamat','$pesan')";
if($konek->query($sql)){
   
}
else{
    echo "Data Customer Gagal Di Tambah : ".$konek->error."<br/>";
}
echo "Sukses..!";
require_once 'contact.php';
?>