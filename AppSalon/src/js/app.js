let paso = 1;

document.addEventListener('DOMContentLoaded', function () {
    inicarApp();
});

function inicarApp() {
    tabs(); // Cambia la seccion cuando se presionen los tabs
}

function mostrarSeccion() {
    console.log('Mostrando');
}

function tabs() {
    const botones = document.querySelectorAll('.tabs button');
    botones.forEach(boton => {
        boton.addEventListener('click', function (e) {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
        });
    });
}