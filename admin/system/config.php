<?php

$host = "localhost";
$username = "root";
$password = "";
$idb_name = "dbhotel";

$konek = new mysqli($host, $username, $password, $idb_name);

//cek koneksi
if($konek->connect_error){
	die("Koneksi Gagal Karena : ". $konek->connect_error);
}
