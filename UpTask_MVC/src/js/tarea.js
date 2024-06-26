(function () {

    obtenerTareas();
    let tareas = [];

    const nuevaTareaBtn = document.querySelector('#agregar-tarea');

    nuevaTareaBtn.addEventListener('click', function () {
        mostrarFormulario();
    });

    async function obtenerTareas() {
        try {
            const id = obtenerProyecto();
            const url = `/api/tareas?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            tareas = resultado.tareas;
            mostrarTareas();
        } catch (error) {
            console.log(error);
        }
    }

    function mostrarTareas() {
        
        limpiarHTML();

        if (tareas.length === 0) {
            const contenedor = document.querySelector('#listado-tareas');
            const textoNoTareas = document.createElement('LI');
            textoNoTareas.textContent = 'No hay Tareas';
            textoNoTareas.classList.add('no-tareas');
            contenedor.appendChild(textoNoTareas);
            return;
        }

        const estados = {
            0: 'Pendiente',
            1: 'Completa'
        }

        tareas.forEach(tarea => {
            const contenedorTara = document.createElement('LI');
            contenedorTara.dataset.tareaId = tarea.id;
            contenedorTara.classList.add('tarea');
            
            const nombreTarea = document.createElement('P');
            nombreTarea.textContent = tarea.nombre;

            const opcionesDiv = document.createElement('DIV');
            opcionesDiv.classList.add('opciones');

            // Botones
            const btnEditarTarea = document.createElement('BUTTON');
            btnEditarTarea.classList.add('editar-tarea');
            btnEditarTarea.dataset.idTarea = tarea.id;
            btnEditarTarea.textContent = 'Editar';
            btnEditarTarea.ondblclick = function () { 
                mostrarFormulario(true, {...tarea});
            }

            const btnEstadoTarea = document.createElement('BUTTON');
            btnEstadoTarea.classList.add('estado-tarea');
            btnEstadoTarea.classList.add(`${estados[tarea.estado].toLowerCase()}`);
            btnEstadoTarea.textContent = estados[tarea.estado];
            btnEstadoTarea.dataset.estadoTarea = tarea.estado;
            btnEstadoTarea.ondblclick = function () {
                cambiarEstadoTarea({...tarea});
            }
            
            const btnEliminarTarea = document.createElement('BUTTON');
            btnEliminarTarea.classList.add('eliminar-tarea');
            btnEliminarTarea.dataset.idTarea = tarea.id;
            btnEliminarTarea.textContent = 'Eliminar';
            btnEliminarTarea.ondblclick = function () {
                confirmarEliminarTarea({ ...tarea });
            }

            opcionesDiv.appendChild(btnEstadoTarea);
            opcionesDiv.appendChild(btnEditarTarea);
            opcionesDiv.appendChild(btnEliminarTarea);

            contenedorTara.appendChild(nombreTarea);
            contenedorTara.appendChild(opcionesDiv);

            const listadoTareas = document.querySelector('#listado-tareas');
            listadoTareas.appendChild(contenedorTara);
        })
    }

    function mostrarFormulario(editar = false, tarea = {}) {
        
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML =
            `
                <form class="formulario nueva-tarea">
                    <legend>${editar ? 'Editar Tarea' : 'Agrega una nueva tarea'}</legend>
                    <div class="campo">
                        <label>Tarea</label>
                        <input
                            type="text"
                            name="tarea"
                            placeholder="${tarea.nombre ? 'Edita la tara' : 'Agregar tarea al proyecto actual'}"
                            id="tarea"
                            value="${tarea.nombre ? tarea.nombre : ''}"
                        />
                    </div>
                    <div class="opciones">
                        <input
                            type="submit"
                            class="submit-nueva-tarea"
                            value="${editar ? 'Editar Tarea' : 'Agrega una nueva tarea'}" 
                        />
                        <button type="button" class="cerrar-modal">Cancelar</button>
                    </div>
                </form>
            `;
        
        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 0);

        modal.addEventListener('click', function (e) {
            e.preventDefault();

            if (e.target.classList.contains('cerrar-modal')) {
                const formulario = document.querySelector('.formulario');
                formulario.classList.add('cerrar');

                setTimeout(() => {
                    modal.remove();
                }, 500);
            }

            if (e.target.classList.contains('submit-nueva-tarea')) {
                const nombreTarea = document.querySelector('#tarea').value.trim();

                if (nombreTarea === '') {
                    // Mostrar una alerta de error
                    mostrarAlerta('El nombre de la tarea es obligatorio', 'error', document.querySelector('.formulario legend'));
                    return;
                }
                
                if (editar) {
                    tarea.nombre = nombreTarea;
                    actualizarTarea(tarea);
                } else {
                    agregarTarea(nombreTarea);
                }
            }
        });
        
        document.querySelector('.dashboard').appendChild(modal);
    }

    // Muestra un mensaje en la interfaz
    function mostrarAlerta(mensaje, tipo, referencia) {
        // previene la creacion de multiples alertas
        const alertaPrevia = document.querySelector('.alerta');

        if (alertaPrevia) {
            alerta.remove();
        }

        const alerta = document.createElement('DIV');
        alerta.classList.add('alerta', tipo);
        alerta.textContent = mensaje;

        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);

        // Eliminar la alerta despues de 3s
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }

    // Consultar el servidor para agregar una nueva tarea al proyecto actual
    async function agregarTarea(tarea) {
        // Construir la peticion
        const datos = new FormData();
        datos.append('nombre', tarea);
        datos.append('proyecto_id', obtenerProyecto());

        try {
            const url = 'http://localhost:3000/api/tarea';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario legend'));

            if (resultado.tipo === 'exito') {
                const modal = document.querySelector('.modal');
                setTimeout(() => {
                    modal.remove();
                }, 2000);

                // Agregar el objeto de tarea al global de tareas
                const tareaObj = {
                    id: String(resultado.id),
                    nombre: tarea,
                    estado: '0',
                    proyecto_id: resultado.proyecto_id
                }

                tareas = [...tareas, tareaObj];
                mostrarTareas();
            }
            
        } catch (error) {
            console.log(error);
        }
    }

    function cambiarEstadoTarea(tarea) {
        const nuevoEstado = tarea.estado === "1" ? "0" : "1";
        tarea.estado = nuevoEstado;
        actualizarTarea(tarea);
    }

    async function actualizarTarea(tarea) {
        const { estado, id, nombre } = tarea;
        const datos = new FormData();
        datos.append('estado', estado);
        datos.append('id', id);
        datos.append('nombre', nombre);
        datos.append('proyecto_id', obtenerProyecto());

        try {
            const url = 'http://localhost:3000/api/tarea/actualizar';

            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if (resultado.respuesta.tipo === 'exito') {
                // mostrarAlerta(resultado.respuesta.mensaje, resultado.respuesta.tipo, document.querySelector('.contenedor-nueva-tarea'));

                Swal.fire(resultado.respuesta.mensaje, resultado.respuesta.mensaje, 'success');

                const modal = document.querySelector('.modal'); 
                if (modal) {
                    modal.remove();
                }

                tareas = tareas.map(tareaMemoria => {
                    if (tareaMemoria.id === id) {
                        tareaMemoria.estado = estado;
                        tareaMemoria.nombre = nombre;
                    }

                    return tareaMemoria;
                });

                mostrarTareas();
            }

        } catch (error) {
            console.log(error);
        }
    }

    function confirmarEliminarTarea(tarea) {
        Swal.fire({
            title: "Eliminar Tarea?",
            showCancelButton: true,
            confirmButtonText: "Si",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                eliminarTarea(tarea);
            }
        });
    }

    async function eliminarTarea(tarea) {
        const { estado, id, nombre } = tarea;
        
        const datos = new FormData();
        datos.append('estado', estado);
        datos.append('id', id);
        datos.append('nombre', nombre);
        datos.append('proyecto_id', obtenerProyecto());

        try {
            const url = 'http://localhost:3000/api/tarea/eliminar';
            
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if (resultado.respuesta.tipo === 'exito') {
                // mostrarAlerta(resultado.respuesta.mensaje, resultado.respuesta.tipo, document.querySelector('.contenedor-nueva-tarea'));

                Swal.fire('Eliminado!', resultado.respuesta.mensaje, 'success');

                tareas = tareas.filter(tareaMemoria => tareaMemoria.id !== tarea.id);

                mostrarTareas();
            }

        } catch (error) {
            console.error(error);
        }
    }

    function obtenerProyecto() {
        const proyectoParams = new URLSearchParams(window.location.search);
        const proyecto = Object.fromEntries(proyectoParams.entries());
        
        return proyecto.id;
    }

    function limpiarHTML() {
        const listadoTareas = document.querySelector('#listado-tareas');
        while (listadoTareas.firstChild) {
            listadoTareas.removeChild(listadoTareas.firstChild);
        }
    }

})();