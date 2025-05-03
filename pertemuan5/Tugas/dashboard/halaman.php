<?php
require_once '../dbkoneksi.php';
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
    /* Styling card box */
    .card-box {
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 5px;
      background-color: #f9f9f9;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      min-height: 150px; /* Menjamin tinggi kotak yang konsisten */
    }
    .card-box h5 {
      font-size: 1.2rem;
    }
    .card-box p {
      flex-grow: 1;
    }
    .card-box .btn {
      align-self: flex-start;
    }
    /* To ensure the cards are equal height */
    .card-columns {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .card-columns .col-md-4 {
      flex: 1 1 calc(33.3333% - 1rem); /* Membuat 3 kolom yang seimbang */
      min-width: 250px;
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
    <a href="#" class="active"><i class="lucide lucide-layout-dashboard"></i> Dashboard</a>
    <a href="../Pasien/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Pasien</a>
    <a href="../Paramedik/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Paramedik</a>
    <a href="../Periksa/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Periksa</a>
    <a href="../Kelurahan/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i> Kelurahan</a>
    <a href="../unit_kerja/list.php" class="active"><i class="lucide lucide-layout-dashboard"></i>Unit Kerja</a>
  </div>

  <!-- Main Content -->
  <div class="main-content flex-grow-1">
    <h1 class="mb-4">Selamat Datang di Dashboard Admin</h1>
    <p class="text-muted">Gunakan menu navigasi di kiri untuk mengakses data sistem puskesmas.</p>

    <!-- Kotak untuk setiap menu yang ada di sidebar -->
    <div class="card-columns">
      <div class="col-md-4">
        <div class="card-box">
          <h5 class="card-title">Pasien</h5>
          <p class="card-text">Kelola informasi pasien yang terdaftar.</p>
          <a href="../Pasien/list.php" class="btn btn-primary btn-sm">Lihat Pasien</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box">
          <h5 class="card-title">Paramedik</h5>
          <p class="card-text">Kelola tenaga medis yang bertugas.</p>
          <a href="../Paramedik/list.php" class="btn btn-success btn-sm">Lihat Paramedik</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box">
          <h5 class="card-title">Riwayat Periksa</h5>
          <p class="card-text">Lihat catatan pemeriksaan pasien.</p>
          <a href="../Periksa/list.php" class="btn btn-warning btn-sm">Lihat Periksa</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box">
          <h5 class="card-title">Kelurahan</h5>
          <p class="card-text">Kelola data kelurahan yang terdaftar.</p>
          <a href="../Kelurahan/list.php" class="btn btn-info btn-sm">Lihat Kelurahan</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box">
          <h5 class="card-title">Unit Kerja</h5>
          <p class="card-text">Kelola data unit kerja yang ada di puskesmas.</p>
          <a href="../unit_kerja/list.php" class="btn btn-secondary btn-sm">Lihat Unit Kerja</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
