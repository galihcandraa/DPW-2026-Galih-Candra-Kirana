# LAPORAN PRAKTIKUM JOBSHEET 06

**Topik:** Fetch API & JSON

---

## 1.1 Tujuan

1. Mengimplementasikan format data JSON (`.json`) sebagai media penyimpanan data simulasi (*mock data*).

2. Menerapkan prinsip modularitas pada JavaScript dengan memisahkan *script* berdasarkan entitas/fitur spesifik modul.

---

## 1.2 Struktur Folder

```text
Jobsheet 6/
├── index.html
├── README.md
├── anggota/
│   ├── list.html
│   └── tambah.html
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── anggota.js
│       └── app.js
│       └── buku.js
├── buku/
│   ├── list.html
│   └── tambah.html
└── docs/
    └── wireframe.md
```

## 1.3 Ringkasan

1. Direktori data/: Terdapat folder baru bernama data/ yang memuat file anggota.json dan buku.json. File ini digunakan untuk menyimpan data entitas dalam bentuk format objek JSON.

2. Modularisasi JavaScript: Pada folder assets/js/, script logika kini dipisah menjadi tiga file, yaitu app.js (untuk logika global/umum), anggota.js (khusus memproses data halaman anggota), dan buku.js (khusus memproses data halaman buku).
