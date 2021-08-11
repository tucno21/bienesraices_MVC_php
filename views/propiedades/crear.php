<main class="contenedor seccion">
    <h1>Crear</h1>

    <a class="boton boton-verde" href="/admin">volver</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <!-- //enctype="multipart/form-data" es importante para subir archivos -->
    <form class="formulario" method="POST" action="/propiedades/crear.php" enctype="multipart/form-data">

        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>