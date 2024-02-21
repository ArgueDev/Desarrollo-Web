<?php
    // Importar la conexion BD
    require 'includes/config/database.php';
    $db = conectarDB();

    // Autenticar el usuario
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errores[] = "El E-mail es obligatorio o no es valido";
        }
        if (!$password) {
            $errores[] = "El Password es obligatorio o no es valido";
        }
        if (empty($errores)){
            // Revisar si el usuario exite
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            if ($resultado -> num_rows) {
                // Revisar si el password es correcto
            } else {
                $errores[] = "El Usuario no existe";
            }
        }
    }

    // Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
        <fieldset>
                <legend>Email y Password</legend>
                
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email" require>

                <label for="password">Password</label>
                <input type="password" placeholder="Tu Password" id="password" name="password" require>

            </fieldset> <!-- Informacion Personal -->

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>