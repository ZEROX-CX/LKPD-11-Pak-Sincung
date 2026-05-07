<?php
include 'koneksi.php';
$id    = $_POST['id'];
$nama_pelanggan  = $_POST['nama_pelanggan'];
$jenis = $_POST['jenis'];
$berat = $_POST['berat'];
$harga = $_POST['hargaKg'];
$total = $_POST['total'];

// escape inputs untuk keamanan
$nama_pelanggan = mysqli_real_escape_string($koneksi, $nama_pelanggan);
$jenis = mysqli_real_escape_string($koneksi, $jenis);
$berat = mysqli_real_escape_string($koneksi, $berat);
$harga = mysqli_real_escape_string($koneksi, $harga);
$total = mysqli_real_escape_string($koneksi, $total);

mysqli_query($koneksi,
"UPDATE laundry SET nama_pelanggan='$nama_pelanggan', jenis_laundry='$jenis', berat='$berat', harga='$harga', total='$total' WHERE id='$id'");

header("Location: index.php");
exit;