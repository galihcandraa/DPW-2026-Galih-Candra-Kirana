<?php
$page_title = "List Anggota";
$active_page = 'list_anggota';
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarAnggota = $_SESSION['anggota'] ?? [];
?>

<section>
    <h2>Daftar Anggota</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo $flash['pesan']; ?>
        </p>
    <?php endif; ?>
    <div class="search-box">
        <label for="search-input">Cari Nama Anggota</label>
        <input type="text" id="search-input" placeholder="Ketik judul anggota...">
    </div>

    <p id="loading-indicator" style="display: none;">Memuat data...</p>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No. Anggota</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>
</section>

<?php
$extra_scripts = [
    $base . 'assets/js/anggota.js'
];
include __DIR__ . '/../includes/footer.php'; ?>