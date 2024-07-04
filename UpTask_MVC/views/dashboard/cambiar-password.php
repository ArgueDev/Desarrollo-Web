<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor-sm">

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Volver al perfil</a>

    <form class="formulario" method="POST" action="/cambiar-password">
        <div class="campo">
            <label for="password">Password Actual</label>
            <input type="password" name="password_actual" placeholder="Tu Password Actual">
        </div>
        <div class="campo">
            <label for="password">Password Nuevo</label>
            <input type="password" name="password_nuevo" placeholder="Tu Password Nuevo">
        </div>
        <input type="submit" value="Guardar Cambios">
    </form>
</div>


<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>