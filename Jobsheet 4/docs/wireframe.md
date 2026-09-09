# Wireframe & User Flow - SIPUS (Sistem Informasi Perpustakaan)

## Aktor

- **Tamu**: hanya bisa melihat katalog buku (Beranda, Daftar Buku) tanpa login.
- **Petugas**: login untuk mengakses seluruh fitur CRUD dan transaksi peminjaman.

## User Flow

### Flow - Login

```bash
[Masuk halaman login] -> [Masukan username/email dan password] -> [Cek kredensial] ->
     (jika valid) -> [Arahkan ke dashboard]
     (jika tidak valid) -> [Tampilkan pesan password/username salah] -> [Kembali ke halaman login]
```

---

### Flow - Registrasi

```bash
[Masuk ke halaman registrasi] -> [Mengisi formulir data] -> [Membuat password] -> [Masukan ulang password] -> [Password sesuai?] -> 
    (Jika sesuai) -> [Tampilkan pesan registrasi berhasil] -> [Masuk halaman login] 
    (jika salah) -> [Buat ulang password] 
```

---
