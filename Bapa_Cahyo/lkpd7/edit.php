<?php
include "koneksi.php";
$id = isset($_GET['id']);
$data = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<form method="post" action="update.php">
<input type="hidden" name="id" value="1">
Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
Kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"><br>
<button type="submit">Update</button>
</form>
