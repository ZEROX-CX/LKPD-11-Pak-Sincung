<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
</head>
<body>
    <form action="function.php" method="POST">
        <label>Nama Pelanggan</label>
        <input type="text" placeholder="nama pelanggan" name="nama">

        <label for="">Jenis laundry</label>
        <select name="jenis" id="jenis">
            <option value="20">Cuci Kering</option>
            <option value="30">Cuci Setrika</option>
        </select>

        <label for="berat">berat(KG)</label>
        <input type="number" id="berat" placeholder="Berat(KG)" name="berat">

        <label for="">Harga per KG</label>
        <input type="number" id="hargaKg" name="hargaKg" readonly>
        

        <label for="harga">Total</label>
        <input type="number" id="total" name="total">
        <button type="submit">Kirim</button>
    </form>
    <script src="function.js"></script>
</body>
</html>