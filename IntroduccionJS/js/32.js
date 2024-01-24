// Async - Await

function descargarClientes() {
    return new Promise(resolve => {
        console.log('Descargando los Clientes...');
        setTimeout(() => {
            resolve('Los Clientes fueron descargados');
        }, 5000);
    });
}

function descargarPedidos() {
    return new Promise(resolve => {
        console.log('Descargando los Pedidos...');
        setTimeout(() => {
            resolve('Los Pedidos fueron descargados');
        }, 3000);
    });
}

async function app() {
    try {
        // const clientes = await descargarClientes();
        // const pedidos = await descargarPedidos();
        // console.log(clientes);
        // console.log(pedidos);
        const resultado = await Promise.all([
            descargarClientes(),
            descargarPedidos()
        ]);
        console.log(resultado[0]);
        console.log(resultado[1]);
    } catch (err) {
        console.log(err);
    }
}

app();