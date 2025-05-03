<?php
require_once '../dbkoneksi.php';

$id = $_GET['id'] ?? '';
$data = [
    'tanggal' => '',
    'berat' => '',
    'tinggi' => '',
    'tensi' => '',
    'keterangan' => '',
    'pasien_id' => '',
    'dokter_id' => ''
];

if ($id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

$pasien = $dbh->query("SELECT id, nama FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
$dokter = $dbh->query("SELECT id, nama FROM paramedik")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemeriksaan | Puskesmas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/lucide@latest/dist/lucide.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      height: 100vh;
      background-color: #0d6efd;
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
    .sidebar-header {
      text-align: center;
      font-weight: bold;
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }
    .main-content {
      margin-left: 250px;
      padding: 2rem;
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
    <h2 class="mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Pemeriksaan</h2>

    <form method="POST" action="proses_periksa.php">
      <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="berat" class="form-label">Berat (kg)</label>
        <input type="number" class="form-control" name="berat" id="berat" step="0.1" value="<?= htmlspecialchars($data['berat']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="tinggi" class="form-label">Tinggi (cm)</label>
        <input type="number" class="form-control" name="tinggi" id="tinggi" step="0.1" value="<?= htmlspecialchars($data['tinggi']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="tensi" class="form-label">Tensi</label>
        <input type="text" class="form-control" name="tensi" id="tensi" value="<?= htmlspecialchars($data['tensi']) ?>">
      </div>

      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan"><?= htmlspecialchars($data['keterangan']) ?></textarea>
      </div>

      <div class="mb-3">
        <label for="pasien_id" class="form-label">Pasien</label>
        <select name="pasien_id" id="pasien_id" class="form-select" required>
          <option value="">-- Pilih Pasien --</option>
          <?php foreach ($pasien as $ps): ?>
            <option value="<?= $ps['id'] ?>" <?= ($ps['id'] == $data['pasien_id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($ps['nama']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="dokter_id" class="form-label">Dokter</label>
        <select name="dokter_id" id="dokter_id" class="form-select" required>
          <option value="">-- Pilih Dokter --</option>
          <?php foreach ($dokter as $dr): ?>
            <option value="<?= $dr['id'] ?>" <?= ($dr['id'] == $data['dokter_id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($dr['nama']) ?>
            </option>
          <?php endforeach; ?>
        </select>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
