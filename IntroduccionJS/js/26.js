// This
const reservacion = {
    nombre: 'Christian',
    apellido: 'Arguello',
    total: 5000,
    pagado: false,
    informacion: function () {
        console.log(`El Cliente ${this.nombre} reservo y su cantidad a pagar es de $${this.total}`);
    }
}

reservacion.informacion();