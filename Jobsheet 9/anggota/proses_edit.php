<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? null;
$nama = trim($_POST['nama'] ?? '');
$no_anggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');
$email = trim($_POST['email'] ?? '');

if (!$id) {
    header('Location: list.php');
    exit;
}

$errors = [];
if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}
if ($no_anggota === '') {
    $errors[] = 'No. Anggota wajib diisi.';
}
if ($alamat === '') {
    $errors[] = 'Alamat wajib diisi.';
}
if ($no_hp === '') {
    $errors[] = 'No. HP wajib diisi.';
}
if ($email === '') {
    $errors[] = 'Email wajib diisi.';
}
if (!str_ends_with($email, '@gmail.com')) {
    $errors[] = 'Email wajib berakhiran @gmail.com.';
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode('', $errors)];
    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "UPDATE anggota SET nama = :nama, no_anggota = :no_anggota,
    alamat = :alamat, no_hp = :no_hp, email = :email WHERE id = :id"
);

$stmt->execute([
    'nama' => $nama,
    'no_anggota' => $no_anggota,
    'alamat' => $alamat,
    'no_hp' => $no_hp,
    'email' => $email,
    'id' => $id,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil diperbarui.'];
header('Location: list.php');
exit;