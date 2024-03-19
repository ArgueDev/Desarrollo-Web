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
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}