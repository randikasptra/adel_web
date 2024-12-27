<?php 
include 'database.php'; 
 
$id = $_GET['id']; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $pendidikan = $_POST['pendidikan']; 
    $tahun = $_POST['tahun']; 
    $nama_sekolah = $_POST['nama_sekolah']; 
 
   
 
    $sql1 = "UPDATE education SET pendidikan='$pendidikan', tahun='$tahun', nama_sekolah='$nama_sekolah' WHERE id='$id'"; 
 
    if ($conn->query($sql1) === TRUE) { 
        header('Location: index.php'); 
    } else { 
        echo "Error: " . $conn->error; 
    } 
} 
 
// Ambil data untuk diedit 
$sql1 = "SELECT * FROM education WHERE id = '$id'"; 
$result1 = $conn->query($sql1); 
$row = $result1->fetch_assoc(); 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Education</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body> 
    <div class="container mt-5"> 
        <h1 class="mb-4">Edit Education</h1> 
        <form action="edit_edu.php?id=<?= $row['id'] ?>" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3"> 
                <label for="pendidikan" class="form-label">Pendidikan</label> 
                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $row['pendidikan'] ?>"> 
            </div> 
            <div class="mb-3"> 
                <label for="tahun" class="form-label">Tahun</label> 
                <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $row['tahun'] ?>" > 
</div>
            <div class="mb-3"> 
                <label for="nama_sekolah" class="form-label">Nama Sekolah / Kampus</label> 
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $row['nama_sekolah'] ?>" > 
           
</div>
            <button type="submit" class="btn btn-warning">Update</button> 
        </form> 
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a> 
    </div> 
</body> 
</html> 
 
<?php $conn->close(); ?>