<?php
include "koneksi.php";

$id = 1;
mysqli_query($koneksi,"DELETE FROM profil_siswa WHERE id='$id'");

echo "Data berhasil dihapus";
?>
