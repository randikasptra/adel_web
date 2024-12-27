<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$no = $_POST['no'];
$pendidikan = $_POST['pendidikan'];
$tahun = $_POST['tahun'];
$nama_sekolah = $_POST['nama_sekolah'];

$sql1 = "INSERT INTO education (no, pendidikan, tahun, nama_sekolah)
VALUES ('$no', '$pendidikan', '$tahun', '$nama_sekolah')";
if ($conn->query($sql1) === TRUE) {
header('Location: index.php');
} else {
echo "Error: " . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Education</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h1 class="mb-4">Tambah Education</h1>
<form action="create_edu.php" method="POST" enctype="multipart/form-data">
<div class="mb-3">
<label for="no" class="form-label">No</label>
<input type="text" class="form-control" id="no" name="no" required>
</div>

<div class="mb-3">
<label for="pendidikan" class="form-label">Pendidikan</label>
<textarea class="form-control" id="pendidikan" name="pendidikan" required></textarea>
</div>
<div class="mb-3">
<label for="tahun" class="form-label">Tahun</label>
<textarea class="form-control" id="tahun" name="tahun"></textarea>
</div>
<div class="mb-3">
<label for="nama_sekolah" class="form-label">Nama Sekolah / Kampus </label>
<textarea class="form-control" id="nama_sekolah" name="nama_sekolah"></textarea>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
<a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
<?php $conn->close(); ?>