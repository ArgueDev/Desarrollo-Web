<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Ponente"
            value="<?php echo $ponente->nombre ?? ''; ?>"
        >
    </div> <!-- Nombre Ponente -->
    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input 
            type="text"
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Apellido Ponente"
            value="<?php echo $ponente->apellido ?? ''; ?>"
        >
    </div> <!-- Apellido Ponente -->
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input 
            type="text"
            class="formulario__input"
            id="ciudad"
            name="ciudad"
            placeholder="Ciudad Ponente"
            value="<?php echo $ponente->ciudad ?? ''; ?>"
        >
    </div> <!-- Ciudad Ponente -->
    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais</label>
        <input 
            type="text"
            class="formulario__input"
            id="pais"
            name="pais"
            placeholder="Pais Ponente"
            value="<?php echo $ponente->pais ?? ''; ?>"
        >
    </div> <!-- Pais Ponente -->
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input 
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div> <!-- Imagen Ponente -->
    <?php if (isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <!-- <img src="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente->imagen . '.png'; ?>" alt="Imagen Ponente"> -->
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente->imagen . '.webp'; ?>" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente->imagen . '.png'; ?>" type="image/png">
                <img loading="lazy" width="200" height="300" src=".jpg" alt="">
            </picture>
        </div>
    <?php } ?>
</fieldset> <!-- Informacion Personal -->

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>
    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Areas de Experiencias (separadas por coma)</label>
        <input 
            type="text"
            class="formulario__input"
            id="tags_input"
            placeholder="Ej. Node.js, PHP, CSS, Laravel, UX/UI"
        >
    </div> <!-- Areas de Experiencia -->
    <div class="formulario__listado" id="tags"></div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
</fieldset> <!-- Informacion Extra -->

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[facebook]"
                placeholder="Facebook"
                value="<?php echo $redes->facebook ?? ''; ?>"
            >
        </div> 
    </div> <!-- Facebook -->
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[twitter]"
                placeholder="Twitter"
                value="<?php echo $redes->twitter ?? ''; ?>"
            >
        </div> 
    </div> <!-- Twitter -->
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[youtube]"
                placeholder="YouTube"
                value="<?php echo $redes->youtube ?? ''; ?>"
            >
        </div> 
    </div> <!-- Youtube -->
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[instagram]"
                placeholder="Instagram"
                value="<?php echo $redes->instagram ?? ''; ?>"
            >
        </div> 
    </div> <!-- Instagram -->
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[tiktok]"
                placeholder="TikTok"
                value="<?php echo $redes->tiktok ?? ''; ?>"
            >
        </div> 
    </div> <!-- TikTok -->
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input 
                type="text"
                class="formulario__input--sociales"
                name="redes[github]"
                placeholder="Github"
                value="<?php echo $redes->github ?? ''; ?>"
            >
        </div> 
    </div> <!-- Github -->
</fieldset> <!-- Redes Sociales -->