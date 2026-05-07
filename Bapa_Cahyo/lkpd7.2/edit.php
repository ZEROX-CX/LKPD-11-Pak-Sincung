<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM menu WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<h2>Edit Menu</h2>
<form method="POST">
    Nama Makanan:
    <input type="text" name="nama_makanan" value="<?= $data['nama_makanan']; ?>" required>
    <br><br>

    Harga:
    <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
    <br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama_makanan'];
    $harga = $_POST['harga'];

    $update = "UPDATE menu SET nama_makanan='$nama', harga='$harga' WHERE id='$id'";
    
    if (mysqli_query($koneksi, $update)) {
        header("Location: tampil.php");
    }
}
?>