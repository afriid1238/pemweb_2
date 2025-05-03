<?php
require_once '../dbkoneksi.php';

$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pemeriksaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <h1 class="mb-4">Data Pemeriksaan</h1>

    <div class="mb-3 d-flex justify-content-between">
      <a href="../dashboard/halaman.php" class="btn btn-secondary">← Kembali</a>
      <a href="form.php" class="btn btn-primary">+ Tambah Pemeriksaan</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Tensi</th>
            <th>Keterangan</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($rs as $row): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['berat'] ?></td>
            <td><?= $row['tinggi'] ?></td>
            <td><?= $row['tensi'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td><?= $row['nama_pasien'] ?></td>
            <td><?= $row['nama_dokter'] ?></td>
            <td class="text-center">
              <a href="form.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="proses.php?hapus=1&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
