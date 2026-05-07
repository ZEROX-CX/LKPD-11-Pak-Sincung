let skor = 0
function jawab(nilai) {
    let hasil = document.getElementById("hasil");
    if(nilai === 5) {
        skor += 10
        hasil.textContent = `Jawaban Benar! Skor anda ${skor}`;
        hasil.style.color = "green";
    } else {
        hasil.textContent = "Jawaban Salah!";
        hasil.style.color = "red";
    }
}

function reset() {
    let hasil = document.getElementById("hasil");
    skor = 0;
    hasil.textContent = '';
}


function show() {
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('show');
}

const btns = document.querySelectorAll('.btn')
const semuaKuis = document.querySelectorAll('.kuis')
btns.forEach(btn => {
    btn.addEventListener('click', function () {
        const id = this.dataset.id
        semuaKuis.forEach(k => k.classList.remove('active'))
        const targetKuis = document.getElementById(id)
        targetKuis.classList.add('active')
    })
})