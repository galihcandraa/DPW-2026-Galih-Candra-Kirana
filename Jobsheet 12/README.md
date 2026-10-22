# LAPORAN PRAKTIKUM JOBSHEET 12

**Topik:** Integrasi Modul Peminjaman

---

## 1.1 Tujuan

1. Mengimplementasikan modul transaksi peminjaman dan pengembalian buku dengan menghubungkan relasi antar-tabel (Foreign Key) antara peminjaman, anggota, dan buku pada PostgreSQL.

2. Mengelola pembaruan status stok buku dan riwayat transaksi peminjaman secara otomatis menggunakan mekanisme Database Transactions (beginTransaction, commit, rollBack) pada PDO.

3. Membangun halaman pencatatan transaksi (tambah.php, proses_tambah.php), pemrosesan pengembalian (kembali.php, proses_kembali.php), serta tampilan riwayat transaksi (riwayat.php).

---

## 1.2 Struktur Folder

```bash
Jobsheet 12/
├── anggota/
│   ├── edit.php
│   ├── hapus.php
│   ├── list.php
│   ├── proses_edit.php
│   ├── proses_tambah.php
│   └── tambah.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   │   └── logo.png
│   └── js/
│       └── app.js
├── auth/
│   ├── login.php
│   ├── logout.php
│   ├── proses_login.php
│   ├── proses_register.php
│   └── register.php
├── buku/
│   ├── edit.php
│   ├── hapus.php
│   ├── list.php
│   ├── proses_edit.php
│   ├── proses_tambah.php
│   └── tambah.php
├── docs/
│   ├── security-checklist.md
│   └── wireframe.md
├── includes/
│   ├── auth.php
│   ├── csrf.php
│   ├── footer.php
│   ├── header.php
│   ├── helpers.php
│   └── koneksi.php
├── peminjaman/
│   ├── kembali.php
│   ├── proses_kembali.php
│   ├── proses_tambah.php
│   ├── riwayat.php
│   └── tambah.php
├── sql/
│   ├── 01_buku_anggota.sql
│   ├── 02_users.sql
│   └── 03_peminjaman.sql
├── debug_session.php
├── index.php
└── README.md
```

## 1.3 Ringkasan

1. Modul Transaksi Peminjaman (peminjaman/): Penambahan direktori peminjaman/ yang memuat antarmuka pencatatan sirkulasi buku (tambah.php, proses_tambah.php), pemrosesan pengembalian buku (kembali.php, proses_kembali.php), serta halaman rekapitulasi transaksi (riwayat.php).

2. Skema Database Relasional (sql/03_peminjaman.sql): Penambahan skrip SQL 03_peminjaman.sql untuk membuat tabel peminjaman yang dilengkapi Foreign Key menunjuk ke tabel buku (buku_id) dan anggota (anggota_id) guna mencatat tanggal pinjam, tanggal kembali, serta status peminjaman.

3. Integritas Transaksi SQL: Penerapan fitur Database Transaction PDO pada proses_tambah.php dan proses_kembali.php untuk memastikan konsistensi data (misalnya: pengurangan stok buku saat dipinjam dan penambahan stok kembali saat dikembalikan berjalan serentak bersama pencatatan status peminjaman).
