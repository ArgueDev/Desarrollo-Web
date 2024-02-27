<?php
    require 'includes/app.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Casa y Depas en Venta</h1>
        <?php
            incluirTemplate('anuncios');
        ?>
    </main>

<?php
    incluirTemplate('footer');
?>