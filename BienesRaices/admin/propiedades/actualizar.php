<?php
    require '../../includes/app.php';
    
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ../admin');
    }

    // Obtener datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    // Manejo de Errores
    $errores = Propiedad::getErrores();

    // Ejecucion del codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
        
        // Validacion
        $errores = $propiedad->validar();

        // Subida de archivos
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Ajustar la imagen
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

            //Asignar el nombre de la imagen a la propiedad
            $propiedad->setImagen($nombreImagen);
        }

        // Revisar que el arreglo de errores este vacio
        if(empty($errores)){

            if($_FILES['propiedad']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            
            $propiedad->cambios();
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="../" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>