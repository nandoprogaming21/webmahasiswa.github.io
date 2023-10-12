// Mengambil elemen dengan ID "contoh-elemen"
const elemen = document.getElementById("contoh-elemen");

// Mengubah teks dalam elemen tersebut
elemen.textContent = "Halo, dunia!";

// Menambahkan event listener untuk merespons klik pada elemen
elemen.addEventListener("click", function() {
  alert("Anda mengklik elemen ini!");
});
