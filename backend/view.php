<?php
include 'database.php';
// Mengambil ID dari parameter query string
$id = $_GET['id'];
// Query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
// Memeriksa apakah data ditemukan
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
} else {
// Jika data tidak ditemukan, redirect ke halaman index
header('Location: index.php');
exit();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Identitas Diri</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h1>Detail Identitas Diri</h1>
<div class="card">
<div class="card-body">
<h5 class="card-title"><?= $row['nama'] ?></h5>
<p class="card-text"><strong>Jenis Kelamin:</strong> <?= $row['jenis_kelamin'] ?></p>
<p class="card-text"><strong>Alamat:</strong> <?= $row['alamat'] ?></p>
<p class="card-text"><strong>Deskripsi:</strong> <?= $row['deskripsi'] ?></p>
<p class="card-text"><strong>Foto:</strong></p>
<img src="assets/images/<?= $row['foto'] ?>" alt="Foto" class="img-fluid" width="200">
</div>
</div>
<a href="index.php" class="btn btn-primary mt-3">Kembali ke Daftar</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>