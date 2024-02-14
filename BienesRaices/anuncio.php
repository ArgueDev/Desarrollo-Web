<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="buil/img.destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000.00</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_habitaciones" loading="lazy">
                    <p>4</p>
                </li>
            </ul>
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
    </main>

<?php
    incluirTemplate('footer');
?>