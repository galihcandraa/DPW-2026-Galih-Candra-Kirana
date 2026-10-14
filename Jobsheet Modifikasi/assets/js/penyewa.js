import { muatDaftar } from "./app.js";

function muatDaftarPenyewa() {
    muatDaftar("penyewa");
}

document.addEventListener("DOMContentLoaded", () => {
    muatDaftarPenyewa()
});