<h1 class="nombre-pagina">Panel de Administracion</h1>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<h2>Buscar Citas</h2>

<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha">
        </div>
    </form>
</div>

<div class="citas-admin">
    <ul class="citas">
        <?php 
        $idCita = '';
            foreach($citas as $key => $cita) {
                // debuguear($key);
                if ($idCita !== $cita->id) {
                    $total = 0;
                    $idCita = $cita->id;
        ?>
        <li>
            <h3>Cliente</h3>
            <p>Hora: <span><?php echo $cita->hora; ?></span></p>
            <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
            <p>Email: <span><?php echo $cita->email; ?></span></p>
            <p>Telefono: <span><?php echo $cita->telefono; ?></span></p>

            <h3>Servicios</h3>

            <?php } // fin if 
                $total += $cita->precio;
            ?>
                <p class="servicio"><?php echo $cita->servicio . " - $" . $cita->precio; ?></p>
                <?php 
                    $actual = $cita->id;
                    $proximo = $citas[$key + 1]->id ?? 0;

                    if(esUtlimo($actual, $proximo)) { ?>
                        <p class="total">Total: <span>$<?php echo $total;?></span></p>
                    <?php } ?>
        <?php } // fin foreach ?>
    </ul>
</div>