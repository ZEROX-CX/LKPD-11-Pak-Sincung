<?php
function validasiInput($nama, $jumlah) {
    if ($nama == "" || $jumlah == "") {
        return "Data tidak boleh kosong";
    } elseif ($jumlah > 3) {
        return "Jumlah kursus maksimal 3";
    } else {
        return "valid";
    }
}
$nama   = $_POST['nama'];
$jumlah = $_POST['jumlah'];

$hasil = validasiInput($nama, $jumlah);

if ($hasil == "valid") {
    echo "Pendaftaran berhasil<br>";
    echo "Nama: $nama<br>";
    echo "Jumlah kursus: $jumlah";
} else {
    echo $hasil;
}
