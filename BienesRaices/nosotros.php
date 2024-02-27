<?php
    require 'includes/app.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="conoce-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="buil/img/nosostros.jpg" type="image/jpeg">
                    <img loading="lazy" src="buil/img/nosostros.jpg" alt="logo nosotros">
                </picture>
            </div>
            <div class="informacion-nosotros">
                <h4>25 Años de Experiencia</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis velit laudantium fuga quos deleniti. 
                    Soluta odit eius expedita voluptates sequi ullam itaque. Recusandae, incidunt possimus labore nihil ad tenetur ut.
                </p>
            </div>
        </div>
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur facilis atque illum vero nostrum vel. 
                    Id enim optio sit eius reiciendis doloribus molestias ab laborum, rem ipsam mollitia modi minima.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur facilis atque illum vero nostrum vel. 
                    Id enim optio sit eius reiciendis doloribus molestias ab laborum, rem ipsam mollitia modi minima.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur facilis atque illum vero nostrum vel. 
                    Id enim optio sit eius reiciendis doloribus molestias ab laborum, rem ipsam mollitia modi minima.</p>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>