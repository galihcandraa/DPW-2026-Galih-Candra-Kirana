<?php
session_start();
require __DIR__ . '/includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$no_anggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');
$email = trim($_POST['email'] ?? '');

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
    "INSERT INTO anggota (nama, no_anggota, alamat, no_hp)
    VALUES (:nama, :no_anggota, :alamat, :no_hp)
    RETURNING id"
);

$stmt->execute([
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: list.php');
exit;