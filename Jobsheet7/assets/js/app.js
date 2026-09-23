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
      updateCounterData();
    }
    console.log(e.target);
  });
}

function updateCounterData() {
  const searchBox = document.querySelector(".search-box");
  const tbody = document.querySelector(".table-responsive table tbody");
  if (!searchBox || !tbody) return;

  const rows = Array.from(tbody.querySelectorAll("tr")).filter(row => !row.querySelector("td[colspan]"));
  
  const totalData = rows.length;
  const barisTampil = rows.filter(row => row.style.display != "none").length;

  let p = searchBox.querySelector(".counter-text");

  if (!p) {
    p = document.createElement("p");
    p.className = "counter-text";
    p.style.marginTop = "5px";
    searchBox.appendChild(p);
  }

  p.textContent = "Menampilkan " + barisTampil + " dari " + totalData;
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

// === Validassi form ===
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
    const judul = form.querySelector("[name = 'judul'], [name = 'nama']");
    const pengarang = form.querySelector("[name = 'pengarang']");

    const fieldRequired = [judul, pengarang];
    fieldRequired.forEach((field) => {
      if (field && field.value.trim() === "") {
        tampilkanError(field, "Field ini wajib diisi.")
        valid = false;
      } else if (field) {
        hapusError(field);
      }
    });

    const tahun = form.querySelector("[name ='tahun']");
    if (tahun) {
      const nilai = parseInt(tahun.value, 10);
      if (isNaN(nilai) || nilai < 1900 || nilai > 2026) {
        tampilkanError(tahun, "Tahun harus di antara 1900 - 2026.");
        valid = false;
      } else {
        hapusError(tahun);
      }
    }

    const regex = /^[0-9-]+$/;
    const isbn = form.querySelector("[name = 'isbn']");
    if (isbn && isbn.value.trim() !== "" && !regex.test(isbn.value)) {
      tampilkanError(isbn, "ISBN hanya menerima angka dan tanda hubung.");
      valid = false;
    } else if (isbn) {
      hapusError(isbn);
    }

    const stok = form.querySelector("[name ='stok']");
    if (stok) {
      const nilai = parseInt(stok.value, 10);
      if (isNaN(nilai) || nilai < 0) {
        tampilkanError(stok, "Stok tidak boleh negatif.");
        valid = false;
      } else {
        hapusError(stok);
      }
    }

    if (!valid) {
      e.preventDefault();
    }
  })
}

// menampilkan daftar buku & anggota secara asinkron
export async function muatDaftar(daftar) {
  const tbody = document.querySelector(".table-responsive table tbody");
  const loading = document.getElementById("loading-indicator");
  if (!tbody) return;

  loading.style.display = "block";
  // tbody.innerHTML = "";

  try {
    await new Promise((resolve) => setTimeout(resolve, 3000));

    const res = await fetch("../data/" + daftar + ".json");
    if (!res.ok) {
      throw new Error("Gagal mengambil data (status " + res.status + ")");
    }

    const hasilData = await res.json();

    hasilData.forEach(function (isi) {
      const tr = document.createElement("tr");
      if (daftar === "buku") {
        tr.innerHTML =
          "<td>" + isi.judul + "</td>" +
          "<td>" + isi.pengarang + "</td>" +
          "<td>" + isi.tahun + "</td>" +
          "<td>" + isi.isbn + "</td>" +
          "<td>" + isi.stok + "</td>" +
          "<td>" + isi.kategori + "</td>" +
          "<td>" +
          "<button type=\"button\">Detail</button>" +
          "<button type=\"button\" class=\"btn-edit\">Edit</button>" +
          "<button type=\"button\" class=\"btn-hapus\">Hapus</button>" +
          "</td>";
      } else if (daftar === "anggota") {
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
      }
      tbody.appendChild(tr);
    });

    updateCounterData();
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