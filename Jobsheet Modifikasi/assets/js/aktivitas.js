import { muatDaftar } from "./app.js";

function muatDaftarAktivitas() {
    muatDaftar("aktivitas");
}

document.addEventListener("DOMContentLoaded", () => {
    muatDaftarAktivitas()
});