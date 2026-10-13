# LAPORAN PRAKTIKUM JOBSHEET 07

**Topik:** PHP Dasar & Form Handling

---

## 1.1 Tujuan

1. Mengonversi kerangka aplikasi web dari halaman statis HTML menjadi halaman berbasis server menggunakan ekstensi PHP.
2. Menerapkan metode modularisasi antarmuka pengguna menggunakan komponen *include* (pemisahan *header* dan *footer*).
3. Menyiapkan alur penerimaan data formulir (*form submission*) melalui file pemrosesan mandiri.
4. Memahami struktur sesi (*session*) dasar dalam siklus hidup aplikasi PHP.

---

## 1.2 Struktur Folder

```text
Jobsheet7/
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
└── includes/
    ├── footer.php
    └── header.php
```

## 1.3 Ringkasan

1. Transisi Ekstensi Server-Side: Semua file .html pada jobsheet sebelumnya telah dikonversi menjadi .php (misalnya index.php, list.php, tambah.php). Ini memungkinkan penulisan logika di sisi server (backend) ke depannya.

2. Direktori includes/: Penambahan kerangka modular berupa header.php dan footer.php. Potongan kode antarmuka ini dirancang agar dapat dipanggil (di-include) ke dalam setiap halaman secara dinamis.

3. Pemisahan Logika Form: Setiap modul (buku dan anggota) kini memiliki file proses_tambah.php. File ini bertindak sebagai penangkap (handler) data yang dikirimkan oleh pengguna melalui antarmuka tambah.php.

4. Manajemen Pengujian: Ditambahkan file debug_session.php di root yang difungsikan untuk melacak dan memecahkan masalah variabel terkait sesi (session) saat pengembangan.

5. Aset Tambahan: Pengenalan direktori img/ beserta file logo.png ke dalam assets untuk memperkaya antarmuka visual.
