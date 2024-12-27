<?php 
include 'database.php'; 
 
$id = $_GET['id']; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nama_project = $_POST['nama_project']; 
    $keterangan = $_POST['keterangan']; 
    $image = $_POST['image']; 
    $link_project = $_POST['link_project']; 
 
    // Cek jika ada foto baru yang diupload 
    if ($_FILES['image']['name'] != '') { 
        $image = $_FILES['image']['name']; 
        $target_dir = "assets/images/"; 
        $target_file = $target_dir . basename($image); 
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file); 
    } else { 
        // Jika foto tidak diubah, biarkan foto lama 
        $sql2 = "SELECT image FROM project WHERE id = '$id'"; 
        $result2 = $conn->query($sql2); 
        $row = $result2->fetch_assoc(); 
        $image = $row['image']; 
    } 
 
    $sql2 = "UPDATE project SET nama_project='$nama_project', keterangan='$keterangan', image='$image', 
link_project='$link_project' WHERE id='$id'"; 
 
    if ($conn->query($sql2) === TRUE) { 
        header('Location: index.php'); 
    } else { 
        echo "Error: " . $conn->error; 
    } 
} 
 
// Ambil data untuk diedit 
$sql2 = "SELECT * FROM project WHERE id = '$id'"; 
$result2 = $conn->query($sql2); 
$row = $result2->fetch_assoc(); 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Project</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body> 
    <div class="container mt-5"> 
        <h1 class="mb-4">Edit Project</h1> 
        <form action="edit_pro.php?id=<?= $row['id'] ?>" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3"> 
                <label for="nama_project" class="form-label">Project</label> 
                <input type="text" class="form-control" id="nama_project" name="nama_project" value="<?= $row['nama_project'] ?>"> 
            </div> 
         
            <div class="mb-3"> 
                <label for="keterangan" class="form-label">Keterangan</label> 
                <textarea class="form-control" id="keterangan" name="keterangan"><?= $row['keterangan'] 
?></textarea> 
            </div> 
            <div class="mb-3"> 
                <label for="image" class="form-label">Image</label> 
                <input type="file" class="form-control" id="image" name="image"> 
                <img src="assets/images/<?= $row['image'] ?>" width="100" class="mt-2"> 
            </div> 
            <div class="mb-3"> 
                <label for="link_project" class="form-label">Link Project</label> 
                <textarea class="form-control" id="link_project" name="link_project" required><?= $row['link_project'] ?>
            </textarea>
</div>
            <button type="submit" class="btn btn-warning">Update</button> 
        </form> 
        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a> 
    </div> 
</body> 
</html> 
 
<?php $conn->close(); ?>