<main class="contenedor seccion">
    <h1>Administrador Bienes Raices</h1>

    <?php if ($resultado): ?>
        <?php $mensaje = mostrarNotificacion(intval($resultado)); ?>
        <?php if ($mensaje): ?>
            <p class="alerta exito"><?php echo clean($mensaje); ?> </p>
        <?php endif; ?>
    <?php endif; ?>


    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar Resultados -->
        <?php foreach ($propiedades as $propiedad ): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="casa" class="imagen-tabla"></td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                    </form>
                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> <!-- Propiedades -->

    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo(a) Vendedor</a>
    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar Resultados -->
        <?php foreach ($vendedores as $vendedor ): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                    </form>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> <!-- Vendedores -->

</main>