<div class="contenedor crear">

    <?php include_once __DIR__ . '/../templates/nombre_sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea Tu Cuenta en UpTask</p>

        <form method="POST" action="/crear" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu Password">
            </div>
            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password" name="password2" id="password2" placeholder="Repite Tu Password">
            </div>
            <input type="submit" class="boton" value="Crear Cuenta">
        </form>
    </div> <!-- .contenedor-sm -->

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
    </div>
</div>