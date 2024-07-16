<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <form class="formulario">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                class="formulario__input" 
                placeholder="Tu Nombre"
            >
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input 
                type="text" 
                name="apellido" 
                id="apellido" 
                class="formulario__input" 
                placeholder="Tu Apellido"
            >
        </div>
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
        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir Password</label>
            <input 
                type="password" 
                name="password2" 
                id="password2" 
                class="formulario__input" 
                placeholder="Repetir Password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/olvide" class="acciones__enlace">Olvide mi password</a>
    </div>
</main>