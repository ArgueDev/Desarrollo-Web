document.addEventListener('DOMContentLoaded', function () {
    eventListeners(); 
    darkMode();
});

function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    const prefrencesDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefrencesDarkMode.matches);

    if (prefrencesDarkMode.matches) {
        document.body.classList.add('.dark-mode');
    } else {
        document.body.classList.remove('.dark-mode');
    }

    prefrencesDarkMode.addEventListener('change', function () {
        if (prefrencesDarkMode.matches) {
            document.body.classList.add('.dark-mode');
        } else {
            document.body.classList.remove('.dark-mode');
        }
    });

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');

        //Para que el modo elegido se quede guardado en local-storage
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');
        } else {
            localStorage.setItem('modo-oscuro','false');
        }
    });

     //Obtenemos el modo del color actual
     if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
    
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Su Telefono</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono" name="telefono">

            <p>Elija la fecha y la hora para la llamada</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha">

            <label for="hora">hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="hora">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="email" >
        `;
    }
}