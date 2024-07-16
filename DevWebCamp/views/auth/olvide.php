<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso en DevWebCamp</p>

    <form class="formulario">
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="formulario__input" 
                placeholder="Tu Email"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta? Obten Una</a>
    </div>
</main>