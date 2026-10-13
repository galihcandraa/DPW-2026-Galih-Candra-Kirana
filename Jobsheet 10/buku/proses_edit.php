<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? null;
$judul = trim($_POST['judul'] ?? '');
$pengarang = trim($_POST['pengarang'] ?? '');
$tahun = trim($_POST['tahun'] ?? '');
$isbn = $_POST['isbn'] ?? '';
$stok = trim($_POST['stok'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');

$regex = '/^[0-9-]+$/';

if (!$id) {
    header('Location: list.php');
    exit;
}

$errors = [];
if ($judul === '') {
    $errors[] = 'Judul wajib diisi.';
}
if ($pengarang === '') {
    $errors[] = 'Pengarang wajib diisi.';
}
if (!empty($isbn) && !preg_match($regex, $isbn)) {
    $errors[] = 'ISBN hanya berisi angka dan tanda hubung.';
}
if (!is_numeric($tahun) || $tahun < 1900 || $tahun > 2026) {
    $errors[] = 'Tahun harus di antara 1900 - 2026.';
}
if (!is_numeric($stok) || $tahun < 0) {
    $errors[] = 'Stok tidak boleh negatif.';
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode('', $errors)];
    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "UPDATE buku SET judul = :judul, pengarang = :pengarang, tahun = :tahun,
    isbn = :isbn, stok = :stok, kategori = :kategori WHERE id = :id"
);

$stmt->execute([
    'judul' => $judul,
    'pengarang' => $pengarang,
    'tahun' => (int) $tahun,
    'isbn' => $isbn,
    'stok' => (int) $stok,
    'kategori' => $kategori,
    'id' => $id,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Buku berhasil diperbarui.'];
header('Location: list.php');
exit;