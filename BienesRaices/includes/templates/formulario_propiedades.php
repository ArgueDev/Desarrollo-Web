<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo clean($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo clean($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> 
    <?php if($propiedad->imagen):?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen propiedad" class="imagen-small">
    <?php endif ;?>
    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo clean($propiedad->descripcion); ?></textarea>
</fieldset> <!-- .informacion General -->

<fieldset>
    <legend>Informacion Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo clean($propiedad->habitaciones); ?>">
    
    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo clean($propiedad->wc); ?>">
    
    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="Estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo clean($propiedad->estacionamiento); ?>">
</fieldset> <!-- .informacion Propiedad -->

<fieldset>
    <legend>Vendedor</legend>

    <!-- <select name="vendedores_id">
        <option value="" disabled selected>--Selecionar Vendedor--</option>
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>
            <option 
                <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : '' ?> 
                value="<?php echo clean($propiedad->vendedor['id']); ?>"> 
                <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?>
            </option>
        <?php endwhile; ?>
    </select> -->
</fieldset> <!-- .Vendedor -->