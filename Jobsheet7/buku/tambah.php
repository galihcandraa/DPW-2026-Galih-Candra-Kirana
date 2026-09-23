<?php
$page_title = "Tambah Buku";
$active_page = 'tambah_buku';
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarBuku = $_SESSION['buku'] ?? [];
?>

<section>
    <h2>Tambah Buku</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo $flash['pesan']; ?>
        </p>
    <?php endif; ?>
    <form id="form-tambah" method="post" action="proses_tambah.php" novalidate>
        <p>
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" required placeholder="Cth: Dikala Senja">
        </p>
        <p>
            <label for="pengarang">Pengarang</label>
            <input type="text" id="Pengarang" name="pengarang" required placeholder="Cth: Tere Liye">
        </p>
        <p>
            <label for="tahun">Tahun Terbit</label>
            <input type="number" id="tahun" name="tahun" min="1980" max="2026" required placeholder="Cth: 2025">
        </p>
        <p>
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" placeholder="Cth: 120-01-100">
        </p>
        <p>
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" min="0" required placeholder="Cth: 5">
        </p>
        <p>
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori">
                <option value="fiksi">Fiksi</option>
                <option value="non-fiksi">Non-Fiksi</option>
                <option value="referensi">Referensi</option>
            </select>
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>