<?php
include('system/config.php');
$query="DELETE from kamar where id_kamar='".$_GET['id']."'";
mysqli_query($konek, $query);
header("location:room.php");
?>