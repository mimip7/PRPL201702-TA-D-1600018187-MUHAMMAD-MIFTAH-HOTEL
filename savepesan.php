<?php

session_start();

$_SESSION['nama_awal'] = $_POST["nama_awal"];
$_SESSION['nama_akhir'] = $_POST["nama_akhir"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['telepone'] = $_POST["telepone"];
$_SESSION['alamat'] = $_POST["alamat"];


if(isset($_POST["alamat"]))
{
$_SESSION['addressline2'] = "";
}
if(isset($_POST["lain_lain"]))
{
$_SESSION['lain_lain'] = $_POST["lain_lain"];
}else{

$_SESSION['lain_lain'] = "";
}

include 'system/config1.php';
mysql_query("INSERT INTO pesan (id_pesan, tamudewasa, tamuanak, cekin, cekout, lain_lain, payment_status, jumlah_bayar, nama_awal, nama_akhir, email, telepone, alamat,durasi) 
VALUES (NULL, '".$_SESSION['dewasa']."' , '".$_SESSION['anak']."', '".$_SESSION['checkin_db']."', '".$_SESSION['checkout_db']."', '".$_SESSION['lain_lain']."', 'pending', '".$_SESSION['jumlah_bayar']."', '".$_SESSION['nama_awal']."', '".$_SESSION['nama_akhir']."', '".$_SESSION['email']."', '".$_SESSION['telepone']."', '".$_SESSION['alamat']."', '".$_SESSION['durasi']."')");
echo mysql_error();
$_SESSION['id_pesan'] = mysql_insert_id();
$count = 0;
foreach ($_SESSION['id_kamar'] as &$value0  ) {

mysql_query("INSERT INTO `pesankamar` (`id_pesan`, `id_kamar`, `jumlah_pesan`, `id` ) VALUES ('".$_SESSION['id_pesan']."', '".$value0."', '".$_SESSION['roomqty'][$count]."', NULL);");
$count = $count+1;
} ;

header("location:selesaipesan.php")
?>