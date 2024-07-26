<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu nuevo password</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if ($token_valido): ?>
        <form class="formulario" method="POST" accion="/olvide">
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Nuevo Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="formulario__input" 
                    placeholder="Tu nuevo password"
                >
            </div>

            <input type="submit" class="formulario__submit" value="Guardar Password">
        </form>
        
        <div class="acciones">
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
            <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta? Obten Una</a>
        </div>
    <?php endif; ?>
</main>