
const boton = document.querySelector('#boton');

boton.addEventListener('click', function () {
    Notification.requestPermission()
        .then(resultado => console.log(`El Resultado es: ${resultado}`))
});

if (Notification.permission == 'granted') {
    new Notification('Esta es una notificacion', {
        icon: 'img/logo.png',
        body: 'Christian'
    })
}