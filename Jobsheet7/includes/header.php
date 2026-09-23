<?php
session_start();

$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPUS<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>

<body>
    <header>
        <div style="display: flex;">
            <div style="background-color: #fff; border-radius: 30px;">
                <img src="<?php echo $base; ?>assets/img/logo.png" alt="logo">
            </div>
            <h1>SIPUS</h1>
        </div>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php"
                        class="<?php echo ($active_page == 'beranda' ? 'active' : '') ?>">Beranda</a></li>
                <li><a href="<?php echo $base; ?>buku/list.php"
                        class="<?php echo ($active_page == 'list_buku' ? 'active' : '') ?>">Daftar Buku</a></li>
                <li><a href="<?php echo $base; ?>buku/tambah.php"
                        class="<?php echo ($active_page == 'tambah_buku' ? 'active' : '') ?>">Tambah Buku</a></li>
                <li><a href="<?php echo $base; ?>anggota/list.php"
                        class="<?php echo ($active_page == 'list_anggota' ? 'active' : '') ?>">Daftar Anggota</a></li>
                <li><a href="<?php echo $base; ?>anggota/tambah.php"
                        class="<?php echo ($active_page == 'tambah_anggota' ? 'active' : '') ?>">Tambah Anggota</a></li>
            </ul>
        </nav>
    </header>

    <main>