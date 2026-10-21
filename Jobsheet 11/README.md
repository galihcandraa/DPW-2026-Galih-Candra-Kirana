# LAPORAN PRAKTIKUM JOBSHEET 11

**Topik:** Keamanan Web Dasar

---

## 1.1 Tujuan

1. Mengimplementasikan mekanisme proteksi Cross-Site Request Forgery (CSRF) menggunakan token verifikasi kriptografis berbasis sesi ($\_SESSION).

2. Menyisipkan token CSRF ke dalam seluruh formulir permintaan POST dan mengevaluasi validitasnya pada skrip penanganan data (proses\_\*.php dan hapus.php).

3. Mengorganisasikan fungsi-fungsi pembantu umum ke dalam file modul helpers.php untuk meningkatkan modularitas dan keterbacaan kode.

4. Memverifikasi keandalan proteksi CSRF melalui pengujian simulasi serangan menggunakan perintah HTTP (cURL).

---

## 1.2 Struktur Folder

```bash
Jobsheet 11/
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
├── sql/
│   ├── 01_buku_anggota.sql
│   └── 02_users.sql
├── debug_session.php
├── index.php
└── README.md
```

## 1.3 Ringkasan

1. Modul Proteksi CSRF (includes/csrf.php): Penambahan fungsi csrf_token(), csrf_field(), dan csrf_verify(). Fungsi ini menghasilkan token acak 32-byte kriptografis aman (random_bytes), menyisipkannya ke formulir HTML, serta memverifikasi kesesuaian token sebelum perintah SQL dieksekusi.

2. Modul Helper (includes/helpers.php): Penambahan file helpers.php di dalam direktori includes/ untuk menampung fungsi-fungsi umum (utility) yang dapat dipanggil kembali di berbagai modul aplikasi.

3. Dokumentasi Keamanan (docs/security-checklist.md): Penambahan berkas security-checklist.md sebagai panduan verifikasi aspek keamanan aplikasi (penanganan SQL Injection, XSS, autentikasi sesi, dan CSRF).

4. Penerapan Guard CSRF pada Modul Transaksi: Penambahan eksekusi csrf_verify() pada seluruh skrip penanganan formulir (proses_tambah.php, proses_edit.php, hapus.php, proses_login.php, dan proses_register.php) untuk menolak transaksi yang tidak menyertakan token CSRF sah dengan status HTTP 403 Forbidden.
