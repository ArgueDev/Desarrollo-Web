// Switch

const metodoPago = 'Efectivo';

switch (metodoPago) {
    case 'Tarjeta':
        console.log('Tarjeta Aprobada');
        break;
    case 'Cheque':
        console.log('Cheque en revision');
        break;
    case 'Efectivo':
        console.log('Pago en Efectivo');
        break;
    default:
        console.log('Metodo de Pago necesario');
        break;
}