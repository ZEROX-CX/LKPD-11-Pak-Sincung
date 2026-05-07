<?php
include "koneksi.php";

$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

mysqli_query($koneksi,
"INSERT INTO siswa (nama,kelas)
 VALUES ('$nama','$kelas')");

echo "Data berhasil disimpan";
?>
