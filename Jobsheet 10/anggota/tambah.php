<?php
$page_title = "Tambah Anggota";
$active_page = 'tambah_anggota';
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarBuku = $_SESSION['anggota'] ?? [];
?>

<section>
    <h2>Tambah Anggota</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo $flash['pesan']; ?>
        </p>
    <?php endif; ?>
    <form id="form-tambah" method="post" action="proses_tambah.php" novalidate>
        <p>
            <label for="nama">Nama</label>
            <input type="text" id="judul" name="nama" required placeholder="Cth: Udin Setiawan">
        </p>
        <p>
            <label for="no_anggota">No. Anggota</label>
            <input type="text" id="no_anggota" name="no_anggota" required placeholder="Cth: 1">
        </p>
        <p>
            <label for="alamat">Alamat</label>
            <input type="test" id="alamat" name="alamat" placeholder="Cth: Jl.Remujung, Lowokwaru, Kota Malang">
        </p>
        <p>
            <label for="no_hp">No. HP</label>
            <input type="text" id="no_hp" name="no_hp" placeholder="Cth: 08**********">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Cth: example@gmail.com">
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>