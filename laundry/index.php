<?php
    include "koneksi.php";
    $data = mysqli_query($koneksi,"SELECT * FROM laundry");
    $row = mysqli_fetch_all($data, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Data Laundry</h1>
    
    <table>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Jenis Laundry</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?= $r['nama_pelanggan'] ?></td>
            <td><?= $r['jenis_laundry'] ?></td>
            <td><?= $r['berat'] ?></td>
            <td><?= $r['harga'] ?></td>
            <td><?= $r['total'] ?></td>
            <td>
                <a href="edit.php?id=<?= $r['id'] ?>">Edit</a>
            </td>
            <td>
                <a href="hapus.php?id=<?= $r['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>