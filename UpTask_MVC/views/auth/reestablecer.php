<div class="contenedor reestablecer">

    <?php include_once __DIR__ . '/../templates/nombre_sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca Tu Nuevo Password</p>

        <form method="POST" action="/reestablecer" class="formulario">
            
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu Password">
            </div>
            
            <input type="submit" class="boton" value="Guardar">
        </form>
    </div> <!-- .contenedor-sm -->

</div>