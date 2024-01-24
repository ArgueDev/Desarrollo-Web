function sumar(n1, n2) {
    return n1 + n2;
}

const resu = sumar(2, 3)
console.log(resu);

let total = 0;

function agregarCarrito(precio) {
    return total += precio;
}

total = agregarCarrito(200);
total = agregarCarrito(200);
total = agregarCarrito(200);

console.log(total);