// POO

/** Object Literal */
const producto = {
    nombre: 'Tablet',
    precio: 500
}

/** Object Constructor */
function Cliente(nombre, apellido) {
    this.nombre = nombre;
    this.apellido = apellido;
}

function Producto(producto, precio) {
    this.producto = producto;
    this.precio = precio;
}

// Crear funciones que solo se utilizan en un objeto en especifico.
Producto.prototype.formatearProducto(producto) = function(){
    return `El Producto ${this.nombre} tiene un precio de: $${this.precio}`;
}

const producto2 = new Producto('Monitor Curvo de 49"', 800, true);
const producto3 = new Producto('Laptop', 300, false);

const cliente = new Cliente('Christian', 'Arguello');

console.log(producto2.formatearProducto());
console.log(producto3.formatearProducto());

