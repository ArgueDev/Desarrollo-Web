// querySelector

const heading = document.querySelector('.header__texto h2'); // 0 a 1 Elemento
heading.textContent = 'Nuevo heading';
// console.log(heading);

// querySelectorAll

const enlaces = document.querySelectorAll('.navegacion a'); // 0 a n Elementos
enlaces[0].textContent = 'Nuevo Enlace'
// console.log(enlaces);

// Generar un nuevo enlace
const nuevoEnlace = document.createElement('A');

// Agregar el href
nuevoEnlace.href = 'nuevo-enlace.html';

// Agregar el texto
nuevoEnlace.textContent = 'Tienda Virtual';

// Agregar la clase
nuevoEnlace.classList.add('navegacion__enlace');

// Agregarlo al documento
const navegacion = document.querySelector('.navegacion');
navegacion.appendChild(nuevoEnlace);

// Eventos
console.log(1);

window.addEventListener('load', function () { // Load espera a que JS y los archivos que dependen del HTML esten listos 
    console.log(2);
});

window.onload = function () {
    console.log(3);
};

document.addEventListener('DOMContentLoaded', function () { // Solo espera por el HTML, pero no espera CSS o imagenes
    console.log(4);
});

console.log(5);

// Seleccionar elementos y asociarles un evento
/*
const btnEnviar = document.querySelector('.boton--primario');
btnEnviar.addEventListener('click', function (evento) {
    console.log(evento);

    evento.preventDefault();

    console.log('Formulario Enviado');
});
*/

// Eventos de los inputs y textarea
const datos = {
    nombre: '',
    email: '',
    mensaje: ''
}

const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');

nombre.addEventListener('input', leerTexto);
email.addEventListener('input', leerTexto);
mensaje.addEventListener('input', leerTexto);

// El Evento de Submit
const formulario = document.querySelector('.formulario');
formulario.addEventListener('submit', function (evento) {
    evento.preventDefault();

    const { nombre, email, mensaje } = datos;
    if (nombre == '' || email == '' || mensaje == '') {
        mostrarAlerta('Todos los campos son obligatorios', true);
        return; // Cortar la ejecucion del codigo
    } else {
        mostrarAlerta('Formulario Enviado Correctamente');
    }

    console.log('Enviando Formulario')
});

function leerTexto(e) {
    console.log('Escribiendo...');
    datos[e.target.id] = e.target.value;
    // console.log(datos);
}

function mostrarAlerta(mensaje, error = null) {
    const alerta = document.createElement('P');
    alerta.textContent = mensaje;
    
    if (error) {
        alerta.classList.add('error');
    } else {
        alerta.classList.add('correcto');
    }

    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 4000);
}