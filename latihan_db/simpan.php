<?php
include "koneksi.php";

$nis   = $_POST['nis'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

mysqli_query($koneksi,
"INSERT INTO profil_siswa (nis,nama,kelas)
 VALUES ('$nis','$nama','$kelas')");

echo "Data berhasil disimpan";
?>
