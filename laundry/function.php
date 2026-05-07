<?php
include "koneksi.php";
function validasiInput($berat, $jenis, $harga, $nama) {
    if(!$berat || !$harga || !$nama || !$jenis) {
        return false;
    }
    return true;
}

function total($jenis, $berat) {
    $total = $jenis * $berat;
    return $total;
}

$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
$harga = isset($_POST['hargaKg']) ? $_POST['hargaKg'] : '';
$berat = isset($_POST['berat']) ? $_POST['berat'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';

if (!validasiInput($berat, $jenis, $harga, $nama)) {
    echo 'Tidak boleh kosong';
    exit;
}

// escape inputs
$nama = mysqli_real_escape_string($koneksi, $nama);
$jenis = mysqli_real_escape_string($koneksi, $jenis);
$harga = mysqli_real_escape_string($koneksi, $harga);
$berat = mysqli_real_escape_string($koneksi, $berat);

$total = total($jenis, $berat);
$tambahSql = "INSERT INTO laundry (nama_pelanggan,jenis_laundry,berat,harga,total) VALUES ('$nama','$jenis','$berat','$harga','$total')";

// execute insert
if (mysqli_query($koneksi, $tambahSql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
