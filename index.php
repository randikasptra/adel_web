<?php
// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "cv_ailinda_2203010046"; // Nama database
// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);
// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);

$sql1 = "SELECT no, pendidikan, tahun, nama_sekolah FROM education";
$result1 = $conn->query($sql1);

$sql2 = "SELECT  nama_project, keterangan, image, link_project FROM project";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Portfolio</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top">
    <div class="container">
      <a class="navbar-brand text-white" href="#">2203010046 | Ai Linda Nurahmah Fadilah | Teknik Informatika B</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-
        target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#home"><b>HOME</b></a></li>
          <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
          <li class="nav-item"><a class="nav-link" href="#projects"><b>PROJECT</b></a></li>
          <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
          <li class="nav-item">
            <button class="btn hire-btn"><b>Hire me</b></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero Section -->
  <section class="hero-section" id="home">
    <div class="container">
      <div class="row align-items-center">
        <!-- Hero Text -->
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-md-6 hero-content">
            <h1 class="text-black"><span class="text-black">I’m</span> <br> <?= $row['nama'] ?></h1>
            <!-- Tampilkan Deskripsi -->
            <p class="my-3 text-black">
              <?= $row['deskripsi'] ?>
            </p>
            <a href="#" class="btn btn-custom">Download CV</a>
          </div>
          <!-- Hero Image -->
          <div class="col-md-6 text-center hero-image">
            <img src="backend/assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
          </div>
      </div>
    </div>
  <?php endwhile; ?>
  </section>

  <section id="">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#000" fill-opacity="1" d="M0,32L48,80C96,128,192,224,288,229.3C384,235,480,149,576,128C672,107,768,149,864,160C960,171,1056,149,1152,149.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <section id="">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#000" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,144C384,128,480,128,576,149.3C672,171,768,213,864,202.7C960,192,1056,128,1152,128C1248,128,1344,192,1392,224L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
  </section>


  <section id="education" class="bg-pink">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col text-black">
          <h2>EDUCATION</h2>
        </div>
      </div>
      <table class="table table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Pendidikan</th>
            <th scope="col">Tahun</th>
            <th scope="col">Nama Sekolah</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result1->num_rows > 0): ?>
            <?php while ($row1 = $result1->fetch_assoc()): ?>
              <tr>
                <td><?= $row1['no'] ?></td>
                <td><?= $row1['pendidikan'] ?></td>
                <td><?= $row1['tahun'] ?></td>
                <td><?= $row1['nama_sekolah'] ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="4">Tidak ada data pendidikan</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#000" fill-opacity="1" d="M0,32L48,80C96,128,192,224,288,229.3C384,235,480,149,576,128C672,107,768,149,864,160C960,171,1056,149,1152,149.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>

  <section id="">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#000" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,144C384,128,480,128,576,149.3C672,171,768,213,864,202.7C960,192,1056,128,1152,128C1248,128,1344,192,1392,224L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
  </section>

  <section id="projects">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2 class="text-black">PROJECT</h2>
        </div>
      </div>
      <div class="row">
        <?php if ($result2->num_rows > 0): ?>
          <?php while ($row2 = $result2->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="backend/assets/images/<?= $row2['image'] ?>" class="card-img-top" alt="<?= $row2['nama_project'] ?>">
                <div class="card-body text-black">
                  <h5 class="card-title"><?= $row2['nama_project'] ?></h5>
                  <p class="card-text"><?= $row2['keterangan'] ?></p>
                </div>
                <div class="card-body">
                  <a href="<?= $row2['link_project'] ?>" class="card-link" target="_blank">Link</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="col">
            <p>No projects available.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#000" fill-opacity="1" d="M0,32L48,80C96,128,192,224,288,229.3C384,235,480,149,576,128C672,107,768,149,864,160C960,171,1056,149,1152,149.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#000" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,144C384,128,480,128,576,149.3C672,171,768,213,864,202.7C960,192,1056,128,1152,128C1248,128,1344,192,1392,224L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
  </svg>
  </section>
  <footer id="contact" class="bg-pink text-black pb-5">
    <h2 class="text-center">Contact</h2>
    <h4 class="text-center"><b>Alamat</b></h4>
    <p class="text-center">Mugarsari, Tasikmalaya</p>
    <p class="text-center">JAWA BARAT, Indonesia</p>
    <p class="text-center">Email: fadilahailinda@gmail.com</p>
    <div class="text-center my-3">
      <!-- Icons -->
      <a href="https://instagram.com" target="_blank" class="text-black mx-2" style="font-size: 1.5rem;">
        <i class="bi bi-instagram"></i>
      </a>
      <a href="https://facebook.com" target="_blank" class="text-black mx-2" style="font-size: 1.5rem;">
        <i class="bi bi-facebook"></i>
      </a>
      <a href="https://twitter.com" target="_blank" class="text-black mx-2" style="font-size: 1.5rem;">
        <i class="bi bi-twitter"></i>
      </a>
    </div>
    <p class="text-center">
      Created with <i class="bi bi-heart-fill text-danger"></i> By :
      <a href="" class="text-black fw-bold">Ai Linda Nurahmah Fadilah</a>
    </p>
  </footer>

  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>