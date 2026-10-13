# LAPORAN PRAKTIKUM JOBSHEET 09

**Topik:** CRUD Penuh

---

## 1.1 Tujuan

1. Mengimplementasikan antarmuka dan logika pemrosesan untuk memperbarui (Update) data yang sudah ada di dalam database PostgreSQL.

2. Mengimplementasikan fitur penghapusan (Delete) data secara persisten dan aman dari database.

3. Melengkapi siklus CRUD (Create, Read, Update, Delete) secara menyeluruh pada modul manajemen entitas buku dan anggota.

---

## 1.2 Struktur Folder

```text
Jobsheet 9/
├── debug_session.php
├── index.php
├── README.md
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
├── buku/
│   ├── edit.php
│   ├── hapus.php
│   ├── list.php
│   ├── proses_edit.php
│   ├── proses_tambah.php
│   └── tambah.php
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

1. Antarmuka Pembaruan Data: Penambahan file edit.php pada modul anggota dan buku yang berfungsi sebagai formulir interaktif untuk menampilkan dan mengubah data yang sudah ada.

2. Logika Eksekusi Update: Pembuatan file proses_edit.php yang bertugas menangkap masukan baru dari pengguna dan menjalankan perintah UPDATE ke database PostgreSQL secara aman.

3. Fitur Penghapusan Data: Penambahan file hapus.php untuk menerima identitas data (seperti ID) dan mengeksekusi perintah DELETE secara persisten langsung dari database.
