<?php
// Koneksi database jika diperlukan
require_once '../dbkoneksi.php';

// Ambil data pasien jika ada id
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PUSKESMAS</title>

  <!-- Link ke CSS Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link ke Icon Lucide (Ikon digunakan untuk menu dan elemen UI lainnya) -->
  <link href="https://unpkg.com/lucide@latest/dist/lucide.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      height: 100vh;
      background: #0d6efd;
      color: white;
      padding-top: 1rem;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
      border-radius: 5px;
      margin-bottom: 5px;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: rgba(255,255,255,0.2);
    }
    .sidebar i {
      margin-right: 10px;
    }
    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }
    .sidebar-header {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: bold;
      font-size: 1.2rem;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar position-fixed w-100" style="max-width:250px;">
    <div class="sidebar-header">
      <i class="lucide lucide-heart-pulse me-2"></i> Admin Puskesmas
    </div>
    <a href="../dashboard/halaman.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Dashboard</a>
    <a href="../Pasien/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Pasien</a>
    <a href="../Paramedik/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Paramedik</a>
    <a href="../Periksa/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Periksa</a>
    <a href="../Kelurahan/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Kelurahan</a>
    <a href="../unit_kerja/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i>Unit Kerja</a>
  </div>

  <!-- Main Content -->
  <div class="main-content flex-grow-1">
    <h1 class="mb-4">Form Data Pasien</h1>

    <!-- Formulir Pasien -->
    <form method="POST" action="proses_pasien.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

      <div class="mb-4 row">
        <label for="kode" class="col-sm-3 col-form-label">Kode:</label>
        <div class="col-sm-9">
          <input type="text" name="kode" id="kode" value="<?= $data['kode'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="mb-4 row">
        <label for="nama" class="col-sm-3 col-form-label">Nama:</label>
        <div class="col-sm-9">
          <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="mb-4 row">
        <label for="tmp_lahir" class="col-sm-3 col-form-label">Tempat Lahir:</label>
        <div class="col-sm-9">
          <input type="text" name="tmp_lahir" id="tmp_lahir" value="<?= $data['tmp_lahir'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="mb-4 row">
        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir:</label>
        <div class="col-sm-9">
          <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $data['tgl_lahir'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="mb-4 row">
        <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
        <div class="col-sm-9">
          <select name="gender" id="gender" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="L" <?= isset($data['gender']) && $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= isset($data['gender']) && $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
          </select>
        </div>
      </div>

      <div class="mb-4 row">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
          <input type="email" name="email" id="email" value="<?= $data['email'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="mb-4 row">
        <label for="alamat" class="col-sm-3 col-form-label">Alamat:</label>
        <div class="col-sm-9">
          <textarea name="alamat" id="alamat" class="form-control"><?= $data['alamat'] ?? '' ?></textarea>
        </div>
      </div>

      <div class="mb-6 row">
        <label for="kelurahan_id" class="col-sm-3 col-form-label">Kelurahan ID:</label>
        <div class="col-sm-9">
          <input type="number" name="kelurahan_id" id="kelurahan_id" value="<?= $data['kelurahan_id'] ?? '' ?>" class="form-control">
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <a href="list.php" class="btn btn-secondary">← Kembali</a>
        <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>" class="btn btn-primary">
          <?= $id ? 'Update' : 'Simpan' ?>
        </button>
      </div>
    </form>
  </div>
</div>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
