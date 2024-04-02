<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
    <fieldset>
            <legend>Email y Password</legend>
            
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="email" require>

            <label for="password">Password</label>
            <input type="password" placeholder="Tu Password" id="password" name="password" require>

        </fieldset> <!-- Informacion Personal -->

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>