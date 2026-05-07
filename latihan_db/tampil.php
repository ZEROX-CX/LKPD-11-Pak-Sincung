<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM siswa");
?>
<script src="script."></script>
<h2>Data Siswa</h2>

<form method="GET" action="cari.php">
    <input type="text" name="cari">
    <button>cari</button>
</form>
<table border="1">
<tr>
    <th>No</th>
    <th>Email</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
while($d = mysqli_fetch_array($data)){
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['email'] ?? ''; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['kelas']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a>
        <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="confirm()">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>