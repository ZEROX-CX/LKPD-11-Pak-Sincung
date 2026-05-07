<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Media Pembelajaran PHP</title>

    <!-- CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 250px;
            padding: 15px;
            margin: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-top: 0;
            color: #2c3e50;
        }

        .card small {
            color: #666;
        }

        .kosong {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<h1>📘 Media Pembelajaran PHP</h1>

<?php
// ==============================
// DATA MATERI (ARRAY)
// ==============================
$materi = [
    [
        "judul" => "PHP Dasar",
        "deskripsi" => "Mengenal dasar bahasa pemrograman PHP.",
        "kategori" => "Dasar"
    ],
    [
        "judul" => "Function PHP",
        "deskripsi" => "Membuat dan menggunakan function dalam PHP.",
        "kategori" => "Fungsi"
    ],
    [
        "judul" => "Percabangan",
        "deskripsi" => "Mengatur alur program dengan if dan else.",
        "kategori" => "Logika"
    ]
];

// ==============================
// FUNCTION MENAMPILKAN CARD
// ==============================
function tampilkanCard($data, $index) {
    if (isset($data[$index])) {
        echo "<div class='card'>
                <h3>{$data[$index]['judul']}</h3>
                <p>{$data[$index]['deskripsi']}</p>
                <small>Kategori: {$data[$index]['kategori']}</small>
              </div>";
    } else {
        echo "<div class='card kosong'>
                <p>Materi belum tersedia.</p>
              </div>";
    }
}
?>

<div class="container">
    <?php
        // PEMANGGILAN FUNCTION (tanpa perulangan)
        tampilkanCard($materi, 0);
        tampilkanCard($materi, 1);
        tampilkanCard($materi, 2);
    ?>
</div>

</body>
</html>
