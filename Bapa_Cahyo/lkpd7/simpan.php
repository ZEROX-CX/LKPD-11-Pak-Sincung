<?php
include "koneksi.php";

$email = $_POST['email'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

if($nama == "" || $kelas == ""){
    echo "Data tidak boleh kosong";
}
else {
    mysqli_query($koneksi,
    "INSERT INTO siswa (nama, kelas, email)
     VALUES ('$nama','$kelas', '$email')");
    
    echo "Data berhasil disimpan";
}
?>
