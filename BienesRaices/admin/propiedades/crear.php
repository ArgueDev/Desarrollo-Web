<?php

    require '../../includes/funciones.php';

    $auth = estaAutenticado();

    if (!$auth) {
        header('location: /');
    }
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores;
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Manejo de Errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descricion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';

    // Ejecucion del codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descricion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes agregar un titulo";
        }
        if(!$precio){
            $errores[] = "Debes agregar el precio";
        }
        if(strlen($descricion) < 50){
            $errores[] = "Debes agregar una descripcion";
        }
        if(!$habitaciones){
            $errores[] = "El numero de habitaciones son obligatorias";
        }
        if(!$wc){
            $errores[] = "El numero de baños son obligatorias";
        }
        if(!$estacionamiento){
            $errores[] = "El numero de estacionamientos son obligatorias";
        }
        if(!$vendedores_id){
            $errores[] = "Elije un vendedor";
        }
        if(!$imagen['name'] || $imagen['error']){
            $errores[] = 'La imagen es Obligatoria';
        }

        // Validar el tamaño de la imagen (1 MB maximo)
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }


        // Revisar que el arreglo de errores este vacio
        if(empty($errores)){
            /** Subida de Archivos */

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // Generar Nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            
            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', 
            '$precio', '$nombreImagen', '$descricion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id' )";
    
            $resultado = mysqli_query($db, $query);

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
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descricion; ?></textarea>
            </fieldset> <!-- .informacion General -->

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
                
                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="Estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset> <!-- .informacion Propiedad -->

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="" disabled selected>--Selecionar Vendedor--</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option 
                            <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : '' ?> 
                            value="<?php echo $vendedor['id']; ?>"> 
                            <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset> <!-- .Vendedor -->

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>