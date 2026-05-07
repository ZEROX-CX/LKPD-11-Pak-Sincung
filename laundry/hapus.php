<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM laundry WHERE id='$id'");

echo "Data berhasil dihapus";
?>
