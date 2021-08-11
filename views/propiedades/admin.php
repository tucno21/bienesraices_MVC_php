<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

    <?php
    if ($resultado) {

        $mensaje = muestraNotificacion(intval($resultado));
        if ($mensaje) {
    ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php }
    }; ?>

    <a class="boton boton-verde" href="/propiedades/crear">Nueva Propiedad</a>
    <a class="boton boton-amarillo" href="/vendedores/crear">Nuevo(a) Vendedor(a)</a>

    <h2>Propiedades</h2>
    <table class="propiedad">
        <thead class="verder">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <thead>
            <!-- //generar a partir de la base de datos -->
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <th><?php echo $propiedad->id; ?></th>
                    <th><?php echo $propiedad->titulo; ?></th>
                    <th><img src="../public/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="casa"></th>
                    <th>$ <?php echo $propiedad->precio; ?></th>
                    <th>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedad">
        <thead class="verder">
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <thead>
            <!-- //generar a partir de la base de datos -->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <th><?php echo $vendedor->id; ?></th>
                    <th><?php echo $vendedor->nombre; ?></th>
                    <th><?php echo $vendedor->apellidos; ?></th>
                    <th><?php echo $vendedor->telefono; ?></th>
                    <th>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>
</main>