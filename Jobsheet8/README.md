# LAPORAN PRAKTIKUM JOBSHEET 08

**Topik:** Koneksi PostgreSQL

---

## 1.1 Tujuan

1. Memigrasikan sistem penyimpanan dan pemuatan data dari basis file system statis (JSON) ke sistem basis data relasional (PostgreSQL).
2. Mengonfigurasi sambungan dan mengelola interaksi database menggunakan ekstensi PHP Data Objects (PDO).
3. Memulai proses transisi arsitektur pemuatan data aplikasi dari Client-Side (JavaScript fetch API) menuju Server-Side Rendering (PHP), dengan mengimplementasikan penggabungan sumber data ganda (database dan JSON lokal).

---

## 1.2 Struktur Folder

```text
Jobsheet8/
├── debug_session.php
├── index.php
├── README.md
├── anggota/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   │   └── logo.png
│   └── js/
│       ├── anggota.js
│       ├── app.js
│       └── buku.js
├── buku/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── data/
│   ├── anggota.json
│   └── buku.json
├── docs/
│   └── wireframe.md
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
└── sql/
    └── 01_buku_anggota.sql
```

## 1.3 Ringkasan

1. Modul Koneksi Database: Penambahan file sentral koneksi.php pada direktori includes/ yang bertugas untuk melakukan instansiasi objek PDO dan menghubungkan aplikasi web ke server PostgreSQL.
2. Definisi Skema (SQL): Pengenalan direktori sql/ beserta skrip 01_buku_anggota.sql yang menjadi kerangka dasar instruksi Data Definition Language (DDL) untuk inisialisasi tabel buku dan anggota pada awal proyek
3. Transisi Metode Rendering (Fase Hibrida): Melakukan penyesuaian logika pemuatan data di sisi server (PHP) untuk mengintegrasikan hasil penghitungan query dari database PostgreSQL bersamaan dengan pembacaan data dari file .json lama, sebagai langkah awal sebelum beralih ke Server-Side Rendering seutuhnya.
