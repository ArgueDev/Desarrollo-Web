(function () {
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');

        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

        async function obtenerPonentes() {
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        function formatearPonentes(arrayPonentes) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            });        
        }

        function buscarPonentes(e) {
            
            const busqueda = eliminarTildes(e.target.value.toLowerCase());

            if (busqueda.length > 3) {
                
                ponentesFiltrados = ponentes.filter(ponente => {
                    const nombreSinTildes = eliminarTildes(ponente.nombre.toLowerCase());
                    return nombreSinTildes.includes(busqueda);
                });

            } else {
                ponentesFiltrados = [];
            }

            mostrarPonentes();
        }

        function eliminarTildes(texto) {
            return texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }

        function mostrarPonentes() {

            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI');
                    ponenteHTML.classList.add('listado-ponentes__ponente');
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id;
                    ponenteHTML.onclick = seleccionarPonente;
    
                    // Agregar al DOM
                    listadoPonentes.appendChild(ponenteHTML);
                });
            } else {
                const noResultado = document.createElement('P');
                noResultado.classList.add('listado-ponentes__no-resultado');
                noResultado.textContent = "No hay resultados para mostrar";

                listadoPonentes.appendChild(noResultado);
            }

        }

        function seleccionarPonente(e) {
            const ponente = e.target;

            // remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');
            }

            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId;
        }
    }
})();