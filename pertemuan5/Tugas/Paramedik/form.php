<?php
// Koneksi database jika diperlukan
require_once '../dbkoneksi.php';
$id_edit = $_GET['id'] ?? null;
$data = [];

if ($id_edit) {
    $stmt = $dbh->prepare("SELECT * FROM paramedik WHERE id = ?");
    $stmt->execute([$id_edit]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Puskesmas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://unpkg.com/lucide@latest/dist/lucide.css" rel="stylesheet"/>
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
    <h1 class="mb-4">Form Data Paramedik</h1>

    <form method="POST" action="proses.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="row mb-4">
        <div class="col-md-6">
          <label class="form-label">Nama:</label>
          <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?? '' ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Gender:</label>
          <input type="text" name="gender" class="form-control" value="<?= $data['nama'] ?? '' ?>">
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-6">
          <label class="form-label">Tempat Lahir:</label>
          <input type="text" name="tmp_lahir" class="form-control" value="<?= $data['nama'] ?? '' ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Tanggal Lahir:</label>
          <input type="text" name="tgl_lahir" class="form-control" value="<?= $data['nama'] ?? '' ?>">
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-6">
          <label class="form-label">Kategori:</label>
          <select name="kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="dokter">1. Dokter</option>
            <option value="perawat">2. Perawat</option>
            <option value="bidan">3. Bidan</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Telepon:</label>
          <input type="text" name="telpon" class="form-control" value="<?= $data['nama'] ?? '' ?>">

        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-12">
          <label class="form-label">Alamat:</label>
          <input type="text" name="alamat" class="form-control" value="<?= $data['nama'] ?? '' ?>">

        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-12">
          <label class="form-label">Unit Kerja:</label>
          <select name="unitkerja_id" class="form-control" required>
            <option value="">-- Pilih Unit Kerja --</option>
            <option value="1">1. Unit Gawat Darurat</option>
            <option value="2">2. Unit Poli Umum</option>
            <option value="3">3. Unit Laboratorium</option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <a href="list.php" class="btn btn-secondary">← Kembali</a>
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">
        <button type="submit" name="proses" class="btn btn-primary" value="<?= isset($data['id']) ? 'update' : 'simpan' ?>">
  <?= isset($data['id']) ? 'Update' : 'Simpan' ?>
</button>

      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
