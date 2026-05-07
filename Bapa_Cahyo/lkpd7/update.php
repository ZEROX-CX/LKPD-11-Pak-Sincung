<?php
include "koneksi.php";

$id    = $_POST['id'];
$email = $_POST['email'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

mysqli_query($koneksi,
"UPDATE siswa SET email='$email', nama='$nama', kelas='$kelas' WHERE id='$id'");

header("location:tampil.php")
?>
