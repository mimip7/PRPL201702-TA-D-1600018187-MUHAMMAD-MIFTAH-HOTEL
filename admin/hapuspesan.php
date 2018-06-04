<?php
include('system/config.php');
$query="DELETE from pesan where id_pesan='".$_GET['id']."'";
mysqli_query($konek, $query);
header("location:datapesan.php");
?>