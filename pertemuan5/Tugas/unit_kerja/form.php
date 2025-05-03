<?php
require_once '../dbkoneksi.php';

// Ambil data jika mode edit
$id = $_GET['id'] ?? '';
$data = ['kode_unit' => '', 'nama_unit' => '', 'keterangan' => ''];

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM unit_kerja WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Unit Kerja | Puskesmas</title>
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
    <h2 class="mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Unit Kerja</h2>

    <form method="POST" action="proses_unit.php">
      <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

      <div class="mb-3">
        <label for="kode_unit" class="form-label">Kode Unit</label>
        <input type="text" class="form-control" id="kode_unit" name="kode_unit" value="<?= htmlspecialchars($data['kode_unit']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="nama_unit" class="form-label">Nama Unit</label>
        <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= htmlspecialchars($data['nama_unit']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>">
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
