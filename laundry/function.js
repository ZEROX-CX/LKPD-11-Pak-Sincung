const jenis = document.getElementById('jenis');
const hargaKg = document.getElementById('hargaKg');
const berat = document.getElementById('berat');
const total = document.getElementById('total');

function harga() {
  hargaKg.value = jenis.value
  const totalHarga = jenis.value * berat.value;
  total.value = totalHarga;
}
jenis.addEventListener('input', harga);
berat.addEventListener('input', harga);
