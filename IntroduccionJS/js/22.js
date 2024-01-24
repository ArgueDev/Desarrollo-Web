// Estructura de Control

const puntaje = 100;

if (puntaje == 1000) {
    console.log('Su puntaje es 1000')
} else {
    console.log('No es el puntaje')
}

const efectivo = 100;
const carrito = 800;

if (efectivo > carrito) {
    console.log('Su compra fue con exito!');
} else {
    console.log('Fondos Insuficientes');
}

const rol = 'Editor';

if (rol == 'Administrador') {
    console.log('Acceso aprobado');
} else if (rol == 'Editor') {
    console.log('Acceso al Editor');
} else {
    console.log('Acceso Denegado');
}