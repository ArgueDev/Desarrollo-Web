// Objetos

const producto = {
    nombreProducto: 'Monitor 20 Pulgadas',
    precio: 300,
    disponible: true
}

// Forma Anterior
const precioProducto = producto.precio;
const nombreProducto = producto.nombreProducto;
// console.log(precioProducto)

// Destructuring
const { precio } = producto; 
console.log(precio);
