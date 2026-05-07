<?php
include "koneksi.php";

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$keyword = mysqli_real_escape_string($koneksi, $keyword);

header('Location: tampil.php?cari=' . urlencode($keyword));
exit;