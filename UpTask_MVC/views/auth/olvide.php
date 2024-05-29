<div class="contenedor olvide">

    <?php include_once __DIR__ . '/../templates/nombre_sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera Tu Password</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form method="POST" action="/olvide" class="formulario">
            
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">
            </div>
            
            <input type="submit" class="boton" value="Recuperar">
        </form>
    </div> <!-- .contenedor-sm -->

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Session</a>
    </div>
</div>