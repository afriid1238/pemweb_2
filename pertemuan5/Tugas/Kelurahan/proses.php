<?php
require_once '../dbkoneksi.php';

// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// === Proses Hapus ===
if (isset($_GET['Hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("DELETE FROM kelurahan WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: list.php");
    exit();
}

// Ambil data dari form POST
$_nama   = $_POST['nama'] ?? null;
$_proses = strtolower($_POST['proses'] ?? ''); // lowercase biar konsisten
$id_edit = $_POST['id_edit'] ?? null;

// === Proses Simpan ===
if ($_proses === "simpan") {
    $stmt = $dbh->prepare("INSERT INTO kelurahan (nama_kelurahan) VALUES (?)");
    $stmt->execute([$_nama]);
    header("Location: list.php");
    exit();
}

// === Proses Update ===
elseif ($_proses === "update") {
    if (!$id_edit) {
        die("ID tidak ditemukan untuk update.");
    }

    $stmt = $dbh->prepare("UPDATE kelurahan SET nama_kelurahan = ? WHERE id = ?");
    $stmt->execute([$_nama, $id_edit]);
    header("Location: list.php");
    exit();
}

// === Jika Proses Tidak Dikenali ===
else {
    die("Proses tidak dikenali. Pastikan tombol yang ditekan adalah Simpan, Update, atau Hapus.");
}
