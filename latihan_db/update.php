<?php
include "koneksi.php";

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

mysqli_query($koneksi,
"UPDATE profil_siswa SET nama='$nama', kelas='$kelas' WHERE id='$id'");

echo "Data berhasil diupdate";
?>
