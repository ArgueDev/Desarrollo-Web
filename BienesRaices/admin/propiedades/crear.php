<?php

    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;
    
    estaAutenticado();

    // Base de datos
    $db = conectarDB();

    $propiedad = new Propiedad;

    // Consultar para obtener los vendedores;
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Manejo de Errores
    $errores = Propiedad::getErrores();

    // Ejecucion del codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $propiedad = new Propiedad($_POST['propiedad']);

        /** Subida de Archivos */
        // Generar Nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
        // Realiza un resize a la imagen con intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }
        
        // Validamos
        $errores = $propiedad->validar();
        
        // Revisar que el arreglo de errores este vacio
        if(empty($errores)){
            
            // Crear carpeta 
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
            
            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            
            // Guardar en la Base de Datos
            $resultado = $propiedad->guardar();

            // Mensaje de exito o error
            if ($resultado){
                // Redirecciona al usuario
                header("Location: ../?resultado=1");
            }
        }

    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data" action="../../admin/propiedades/crear.php">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>