<?php
$page_title = "List Anggota";
$active_page = 'list_anggota';
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarAnggota = $pdo->query("SELECT * FROM anggota ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
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
                <?php if (empty($daftarAnggota)): ?>
                    <tr id="info-data" style="display: none;">
                        <td colspan="5">Belum ada data anggota. Silahkan tambah lewat menu "Tambah Anggota".</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($daftarAnggota as $anggota): ?>
                        <tr>
                            <td>
                                <?php echo $anggota['no_anggota'] ?>
                            </td>
                            <td>
                                <?php echo $anggota['nama'] ?>
                            </td>
                            <td>
                                <?php echo $anggota['alamat'] ?>
                            </td>
                            <td>
                                <?php echo $anggota['no_hp'] ?>
                            </td>
                            <td>
                                <?php echo $anggota['email'] ?>
                            </td>
                            <td>
                                <button type="button">Detail</button>
                                <button type="button" class="btn-edit">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php
$extra_scripts = [
    $base . 'assets/js/anggota.js'
];
include __DIR__ . '/../includes/footer.php'; ?>