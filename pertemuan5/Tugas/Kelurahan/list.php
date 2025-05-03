<?php
require_once '../dbkoneksi.php';

// Ambil data dari tabel kelurahan
$sql = "SELECT * FROM kelurahan";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kelurahan | Admin Puskesmas</title>
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
    .sidebar-header {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: bold;
      font-size: 1.2rem;
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
    <h2 class="mb-4">Data Kelurahan</h2>
     <!-- Tombol navigasi -->
     <div class="mb-3 d-flex justify-content-between">
      <a href="../dashboard/halaman.php" class="btn btn-secondary">← Kembali</a>
      <a href="form.php" class="btn btn-primary">+ Tambah Kelurahan</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>Nomor</th>
          <th>Nama Kelurahan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($rs as $row){
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row->nama_kelurahan; ?></td>
          <td>
            <a href="form.php?id=<?= $row->id; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="proses.php?Hapus=1&id=<?= $row->id; ?>"
               onclick="return confirm('Anda yakin ingin menghapus data ini?')"
               class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
