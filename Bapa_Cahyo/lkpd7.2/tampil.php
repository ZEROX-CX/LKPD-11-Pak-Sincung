<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tampil</title>
</head>
<body>
    <h2>Daftar Menu Kantin</h2>
    <a href="tambah.php">[+] Tambah Menu Baru</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
        <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM menu");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_makanan']; ?></td>
            <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>

    <?php } ?>
</table>
</body>
</html>