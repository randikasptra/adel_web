<?php
include 'database.php';
// Query untuk mengambil semua data dari tabel users
$sql = "SELECT * FROM users";
$result = $conn->query($sql); // Eksekusi query
$sql1 = "SELECT * FROM education";
$result1 = $conn->query($sql1); // Eksekusi query
$sql2 = "SELECT * FROM project";
$result2 = $conn->query($sql2); // Eksekusi query
if ($result->num_rows <= 0) {
    echo "<div class='alert alert-warning'>Data tidak ditemukan</div>";
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Identitas Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Identitas Diri</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Identitas</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td>
                            <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
                        </td>
                        <td>
                            <!-- Tombol Edit dan Hapus -->
                            <div class="d-flex gap-2">
                                <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <div class="container mt-5">
        <h1 class="mb-4">Data Education</h1>
        <a href="create_edu.php" class="btn btn-primary mb-3">Tambah Education</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pendidikan</th>
                    <th>Tahun</th>
                    <th>Nama Sekolah / Kampus</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result1->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td><?= $row['pendidikan'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td><?= $row['nama_sekolah'] ?></td>

                        <td>
                            <!-- Tombol Edit dan Hapus -->
                            <div class="d-flex gap-2">
                                <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="edit_edu.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_edu.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>





    <div class="container mt-5">
        <h1 class="mb-4">Data Project</h1>
        <a href="create_pro.php" class="btn btn-primary mb-3">Tambah Project</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project</th>
                    <th>Keterangan</th>
                    <th>Image</th>
                    <th>Link Project</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result2->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td><?= $row['nama_project'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td>
                            <img src="assets/images/<?= $row['image'] ?>" alt="image" width="100">
                        </td>
                        <td><?= $row['link_project'] ?></td>
                        <td>
                            <!-- Tombol Edit dan Hapus -->
                            <div class="d-flex gap-2">
                                <a href="view.php" class="btn btn-primary btn-sm">View</a>
                                <a href="edit_pro.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_pro.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php $conn->close(); ?>