// Clases 
class Producto{
    constructor(nombre, precio) {
        this.nombre = nombre;
        this.precio = precio;
    }

    formatearProducto() {
        return `El Producto ${this.nombre} tiene un precio de: $${this.precio}`
    }
}

// Herencia
class Libro extends Producto{
    constructor(nombre, precio, id) {
        super(nombre, precio);
        this.id = id;
    }

    formatearProducto() {
        return `${super.formatearProducto()} y su ID: ${this.id}`
    }
}

const producto = new Producto('Monitor Curvo de 49"', 800);
const producto2 = new Producto('Laptop"', 200);
const libro = new Libro('JavaScript Moderno', 120, '3546842');

console.log(producto.formatearProducto());
console.log(producto2);
console.log(libro.formatearProducto()); 