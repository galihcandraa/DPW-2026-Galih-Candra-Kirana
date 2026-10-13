<?php
$page_title = "Beranda";
$active_page = 'beranda';
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$countDbBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
$countdDbAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();

$jsonBukuCount = 0;
$jsonAnggotaCount = 0;

$fileBuku = __DIR__ . '/data/buku.json';
if (file_exists($fileBuku)) {
    $dataBukuJSON = json_decode(file_get_contents($fileBuku), true);
    if (is_array($dataBukuJSON)) {
        $jsonBukuCount = count($dataBukuJSON);
    }
}

$fileAnggota = __DIR__ . '/data/anggota.json';
if (file_exists($fileAnggota)) {
    $dataAnggotaJSON = json_decode(file_get_contents($fileAnggota), true);
    if (is_array($dataAnggotaJSON)) {
        $jsonAnggotaCount = count($dataAnggotaJSON);
    }
}

// 3. Jumlahkan data Database + data JSON
$totalBuku = $countDbBuku + $jsonBukuCount;
$totalAnggota = $countdDbAnggota + $jsonAnggotaCount;
?>

<section>
    <h2>Selamat datang di Sistem Informasi Perpustakaan</h2>
    <p>Aplikasi digital yang digunakan untuk mengelola seluruh kegiatan operasional perpustakaan secara otomatis.</p>
</section>

<section>
    <h2>Ringkasan</h2>
    <article>
        <h3>Total Buku</h3>
        <p><?php echo $totalBuku; ?></p>
    </article>

    <article>
        <h3>Total Anggota</h3>
        <p><?php echo $totalAnggota; ?></p>
    </article>

    <article>
        <h3>Sedang Dipinjam</h3>
        <p>2</p>
    </article>

    <article>
        <h3>Buku Terlambat</h3>
        <p>0</p>
    </article>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>