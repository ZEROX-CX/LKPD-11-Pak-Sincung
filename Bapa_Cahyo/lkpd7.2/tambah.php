<?php include 'koneksi.php'; ?>
<h2>Tambah Menu Baru</h2>
<form method="POST">
    Nama Makanan: <input type="text" name="nama_makanan" required><br><br>
    Harga: <input type="number" name="harga" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_makanan'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO menu (nama_makanan, harga) VALUES ('$nama', '$harga')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil.php");
        echo "Data berhasil disimpan.";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>