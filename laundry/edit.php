<?php
include "koneksi.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = mysqli_query($koneksi,"SELECT * FROM laundry WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laundry</title>
</head>
<body>
    <h1>Edit Data Laundry</h1>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required><br><br>

        <label>Jenis Laundry:</label>
        <select name="jenis" id="jenis" required>
            <option value="20" <?php if($row['jenis_laundry'] == 'Cuci Kering') echo 'selected'; ?>>Cuci Kering</option>
            <option value="30" <?php if($row['jenis_laundry'] == 'Cuci Setrika') echo 'selected'; ?>>Cuci Setrika</option>
        </select><br><br>

        <label>Berat (KG):</label>
        <input type="number" id="berat" name="berat" value="<?php echo $row['berat']; ?>" required><br><br>

        <label>Harga per KG:</label>
        <input type="number" id="hargaKg" name="hargaKg" readonly value="<?php echo $row['harga']; ?>"><br><br>

        <label>Total:</label>
        <input type="number" id="total" name="total" value="<?php echo $row['total']; ?>" required><br><br>

        <button type="submit">Update</button>
    </form>

    <script src="function.js"></script>
</body>
</html>
