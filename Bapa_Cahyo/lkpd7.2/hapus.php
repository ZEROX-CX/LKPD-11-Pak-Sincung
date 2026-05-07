<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM menu WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("Location: tampil.php");
} else {
    echo "Gagal menghapus data.";
}
?>