// === Hamburger menu ===
function initNavToggle() {
  const toggleBtn = document.getElementById("nav-toggle-btn");
  const nav = document.querySelector("header nav");
  if (!toggleBtn || !nav) return;

  toggleBtn.addEventListener("click", function () {
    nav.classList.toggle("nav-open");
  });
}

// === Konfirmasi hapus ===
function initHapusConfirm() {
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-hapus");
    if (!btn) return;

    const row = btn.closest("tr");
    const nama = row ? row.querySelector("td")?.textContent : "data ini";
    const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?")
    if (yakin && row) {
      row.remove();
      --counter;
      updateCounterData();
    }
    console.log(e.target);
  });
}

let counter = 0;
function updateCounterData() {
  const searchBox = document.querySelector(".loading-indicator");
  if (!searchBox) return;

  const rows = document.querySelectorAll("tbody tr");
  let p = searchBox.querySelector(".counter-text");

  if (!p) {
    p = document.createElement("p");
    p.className = "counter-text";
    p.style.marginTop = "5px";
    searchBox.appendChild(p);
  }

  p.textContent = "Menampilkan " + counter + " dari " + rows.length + " data";
}

function setCounter(jumlah) {
  counter = jumlah;
  updateCounterData();
}

// === Filter / pencarian tabel ===
function initTableFilter() {
  const input = document.getElementById("search-input");
  const table = document.querySelector(".table-responsive table");
  if (!input || !table) return;

  let rows = table.querySelectorAll("tbody tr");
  counter = rows.length;
  updateCounterData();

  input.addEventListener("keyup", function () {
    const keyword = input.value.toLowerCase();
    counter = 0;

    rows = table.querySelectorAll("tbody tr");

    rows.forEach(function (row) {
      const teks = row.querySelector("td").textContent.toLowerCase();
      row.style.display = teks.includes(keyword) ? "" : "none";
      if (row.style.display === "") {
        ++counter;
      }
    });

    updateCounterData();
  });
}

// === Validasi form ===
function tampilkanError(input, pesan) {
  hapusError(input);
  const span = document.createElement("span");
  span.className = "error";
  span.textContent = pesan;
  input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
  const next = input.nextElementSibling;
  if (next && next.classList.contains("error")) {
    next.remove();
  }
}

function initValidasiForm() {
  const form = document.getElementById("form-tambah");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    let valid = true;

    // Selector field
    const nama = form.querySelector("[name='nama']");
    const merk = form.querySelector("[name='merk']");
    const harga = form.querySelector("[name='harga']");
    const totalStok = form.querySelector("[name='total_stok']");
    const stokTersedia = form.querySelector("[name='stok_tersedia']");
    const kategori = form.querySelector("[name='kategori']");

    const fieldRequired = [nama, merk];
    fieldRequired.forEach((field) => {
      if (field && field.value.trim() === "") {
        tampilkanError(field, "Field ini wajib diisi.");
        valid = false;
      } else if (field) {
        hapusError(field);
      }
    });

    if (harga) {
      const nilaiHarga = parseFloat(harga.value);
      if (isNaN(nilaiHarga) || nilaiHarga <= 0) {
        tampilkanError(harga, "Harga harus berupa angka lebih dari 0.");
        valid = false;
      } else {
        hapusError(harga);
      }
    }

    let nilaiTotalStok = 0;
    if (totalStok) {
      nilaiTotalStok = parseInt(totalStok.value, 10);
      if (isNaN(nilaiTotalStok) || nilaiTotalStok < 0) {
        tampilkanError(totalStok, "Total stok tidak boleh negatif.");
        valid = false;
      } else {
        hapusError(totalStok);
      }
    }

    if (stokTersedia) {
      const nilaiStokTersedia = parseInt(stokTersedia.value, 10);
      if (isNaN(nilaiStokTersedia) || nilaiStokTersedia < 0) {
        tampilkanError(stokTersedia, "Stok tersedia tidak boleh negatif.");
        valid = false;
      } else if (totalStok && nilaiStokTersedia > nilaiTotalStok) {
        tampilkanError(stokTersedia, "Stok tersedia tidak boleh melebihi total stok.");
        valid = false;
      } else {
        hapusError(stokTersedia);
      }
    }

    if (kategori) {
      const opsiValid = ["shelter", "cooking", "trekking"];
      if (!opsiValid.includes(kategori.value.trim().toLowerCase())) {
        tampilkanError(kategori, "Pilih kategori yang valid (shelter, cooking, trekking).");
        valid = false;
      } else {
        hapusError(kategori);
      }
    }

    if (!valid) {
      e.preventDefault();
    }
  });
}

// menampilkan daftar buku & anggota secara asinkron
export async function muatDaftar(daftar) {
  const tbody = document.querySelector(".table-responsive table tbody");
  const loading = document.getElementById("loading-indicator");
  if (!tbody) return;

  loading.style.display = "block";
  tbody.innerHTML = "";

  try {
    await new Promise((resolve) => setTimeout(resolve, 1000));

    const path = daftar === "aktivitas" ? "data/" : "../data/";
    const res = await fetch(path + daftar + ".json");
    if (!res.ok) {
      throw new Error("Gagal mengambil data (status " + res.status + ")");
    }

    const hasilData = await res.json();

    hasilData.forEach(function (isi) {
      const tr = document.createElement("tr");
      if (daftar === "alat") {
        tr.innerHTML =
          "<td>" + isi.nama + "</td>" +
          "<td>" + isi.merk + "</td>" +
          "<td>" + isi.harga + "</td>" +
          "<td>" + isi.total_stok + "</td>" +
          "<td>" + isi.stok_tersedia + "</td>" +
          "<td>" + isi.kategori + "</td>" +
          "<td>" +
          "<button type=\"button\">Detail</button>" +
          "<button type=\"button\" class=\"btn-edit\">Edit</button>" +
          "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
          "</td>";
      } else if (daftar === "penyewa") {
        tr.innerHTML =
          "<td>" + isi.no_anggota + "</td>" +
          "<td>" + isi.nama + "</td>" +
          "<td>" + isi.alamat + "</td>" +
          "<td>" + isi.no_hp + "</td>" +
          "<td>" + isi.email + "</td>" +
          "<td>" +
          "<button type=\"button\">Detail</button>" +
          "<button type=\"button\" class=\"btn-edit\">Edit</button>" +
          "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
          "</td>";
      } else if (daftar === "aktivitas") {
        tr.innerHTML =
          "<td>" + isi.jenis + "</td>" +
          "<td>" + isi.penyewa + "</td>" +
          "<td>" + isi.alat + "</td>" +
          "<td>" + isi.waktu + "</td>";
      }
      tbody.appendChild(tr);
    });

    setCounter(hasilData.length);
  } catch (err) {
    tbody.innerHTML =
      "<tr><td colspan=\"6\">Gagal memuat data: " + err.message + "</td></tr>";
  } finally {
    loading.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  initNavToggle();
  initHapusConfirm();
  initTableFilter();
  initValidasiForm();
});