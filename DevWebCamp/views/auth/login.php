<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia Session en DevWebCamp</p>

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
        <div class="formulario__campo">
            <label class="formulario__label" for="password">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="formulario__input" 
                placeholder="Tu Password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Inciar Sesion">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta? Obten Una</a>
        <a href="/olvide" class="acciones__enlace">Olvide mi password</a>
    </div>
</main>