// Arreglos o Arrays

const numeros = [10, 20, 30, 40, 50];
console.table(numeros);

const meses = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo');
console.table(meses);

const arreglo = ['Hola', 10, true, 'si', null, { nombre: 'Juan', trabajo: 'Programador' }, [1, 2, 3]];
console.log(arreglo);

// Acceder a los valores de un arreglo
console.log(numeros[4]);

// Conocer la extension de un arreglo
console.log(meses.length);

// Iterar un Arreglo
numeros.forEach(function (numero) {
    console.log(numero)
});

// Rest Operator
const nuevoArreglo = [...meses, 'Junio'];
console.log(nuevoArreglo);