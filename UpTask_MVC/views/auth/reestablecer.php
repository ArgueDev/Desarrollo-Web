<div class="contenedor reestablecer">

    <?php include_once __DIR__ . '/../templates/nombre_sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca Tu Nuevo Password</p>
        
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        
        <?php if($mostrar) { ?>

        <form method="POST" class="formulario">
            
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu Password">
            </div>
            
            <input type="submit" class="boton" value="Guardar">
        </form>
        <?php } ?>
    </div> <!-- .contenedor-sm -->

    <div class="acciones">
        <a href="/crear">¿Aun no tienes una cuenta? Obtener una</a>
        <a href="/olvide">¿Olvidaste tu password?</a>
    </div>

</div>