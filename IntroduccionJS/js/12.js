// Objetos

const producto = {
    nombreProducto: 'Monitor 20 Pulgadas',
    precio: 300,
    disponible: true
}

Object.freeze(producto);

producto.imagen = 'imagen.jpg';

console.log(producto);