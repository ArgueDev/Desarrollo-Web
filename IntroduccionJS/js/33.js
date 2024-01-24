function obtenerEmpleados() {
    const api = 'js/empleados.json';
    fetch(api)
        .then(resultado => resultado.json())
        .then(datos => console.log(datos.empleados))
}

obtenerEmpleados();