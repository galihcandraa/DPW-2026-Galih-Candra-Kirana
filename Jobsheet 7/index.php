<?php
$page_title = "Beranda";
$active_page = 'beranda';
include __DIR__ . '/includes/header.php';
?>

<section>
    <h2>Selamat datang di Sistem Informasi Perpustakaan</h2>
    <p>Aplikasi digital yang digunakan untuk mengelola seluruh kegiatan operasional perpustakaan secara otomatis.</p>
</section>

<section>
    <h2>Ringkasan</h2>
    <article>
        <h3>Total Buku</h3>
        <p>105</p>
    </article>

    <article>
        <h3>Total Anggota</h3>
        <p>15</p>
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