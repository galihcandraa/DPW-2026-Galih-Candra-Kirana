# LAPORAN PRAKTIKUM JOBSHEET 01

**Topik:** Dasar HTML & Sistem Perpustakaan Sederhana  

---

## 1.1 Tujuan

1. Mengimplementasikan struktur dasar dokumen HTML5.
2. Membangun navigasi multi-halaman berbasis modul folder menggunakan *relative path*.
3. Menyajikan data master (buku dan anggota) dalam bentuk tabel (`<table>`).
4. Membuat antarmuka formulir input data (`<form>`, `<input>`, `<select>`, `<button>`) untuk penambahan data buku dan anggota.

---

## 1.2 Struktur Folder

```text
Jobsheet 1/
├── index.html
├── anggota/
│   ├── list.html
│   └── tambah.html
└── buku/
    ├── list.html
    └── tambah.html
```

## 1.3 Ringkasan

1. index.html (Halaman Utama):
    * Berfungsi sebagai dashbord beranda sistem perpustakaan.
    * Memuat tautan navigasi utama menuju modul data anggota (anggota/list.html) dan modul data buku (buku/list.html).

2. Folder Anggota (Jobsheet 1/anggota/):
    * list.html: Menampilkan tabel daftar anggota terdaftar (ID, Nama, Program Studi, Kontak) beserta tombol aksi menuju form tambah.
    * tambah.html: Berisi formulir input registrasi anggota baru (NIM/ID, Nama Lengkap, Jenis Kelamin, Program Studi, tombol Simpan & Batal).

3. Folder Buku (Jobsheet 1/buku/):
    * list.html: Menampilkan tabel katalog koleksi buku (Kode Buku, Judul, Pengarang, Penerbit, Tahun, Status) beserta tautan menuju form tambah buku.
    * tambah.html: Berisi formulir input untuk menambahkan data buku baru ke dalam katalog sistem.

## 1.4 Latihan Reflektif

1. Kenapa field "Alamat" dan "No. HP" tidak diberi `required`, sedangkan "Nama" dan "No. Anggota" diberi?
    > Jawaban: Karena field Alamat dan No. HP termasuk data yang bersifat opsional.

2. Apa yang akan terjadi (di browser) kalau kamu klik tombol "Simpan" tanpa mengisi field "Nama"? Coba buka filenya di browser dan praktikkan.
    > Jawaban: Muncul peringatan "Please fill  out this field" dari browsernya.

3. Form ini juga **belum punya `action`** pada tag `<form>`-nya — apa dampaknya saat tombol "Simpan" ditekan?
    > Jawaban: Tidak akan terjadi apa-apa (browser hanya me reload halaman)
