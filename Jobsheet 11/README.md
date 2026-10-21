# LAPORAN PRAKTIKUM JOBSHEET 10

**Topik:** Autentikasi & Manajemen Sesi

---

## 1.1 Tujuan

1. Mengimplementasikan sistem autentikasi pengguna (Login, Register, dan Logout) menggunakan PHP murni.

2. Mengelola sesi pengguna (Session) secara aman untuk membatasi hak akses pada halaman-halaman tertentu (Authorization).

3. Melakukan pembaruan skema database dengan menambahkan tabel baru untuk menyimpan kredensial pengguna secara persisten.

---

## 1.2 Struktur Folder

```bash
Jobsheet 10/
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
│   └── wireframe.md
├── includes/
│   ├── auth.php
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
├── sql/
│   ├── 01_buku_anggota.sql
│   └── 02_users.sql
├── debug_session.php
├── index.php
└── README.md
```

## 1.3 Ringkasan

1. Modul Autentikasi Baru: Terdapat penambahan direktori auth/ secara khusus yang memuat antarmuka interaktif dan logika pemrosesan untuk pendaftaran akun baru (register.php, proses_register.php) serta otentikasi masuk (login.php, proses_login.php).

2. Implementasi Tabel Kredensial: Penambahan file 02_users.sql di dalam folder sql/ yang memuat instruksi pembuatan tabel baru pada database PostgreSQL untuk menyimpan data akses pengguna secara terpisah dari data buku dan anggota.

3. Manajemen Sesi dan Akses (Otorisasi): Penambahan file auth.php di dalam direktori includes/. File ini difungsikan sebagai sistem pelindung (middleware) yang akan memeriksa keberadaan sesi yang sah, serta memblokir akses ke fitur CRUD jika pengguna belum melakukan login.

4. Fitur Pengakhiran Sesi: Penambahan skrip logout.php di dalam direktori auth/ yang bertugas untuk menghancurkan data sesi (session_destroy()) secara aman dan mengarahkan kembali pengguna ke halaman login atau beranda umum.
