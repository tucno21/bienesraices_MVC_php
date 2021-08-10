<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/build/css/app.css">
    <title>Bienes Raices</title>
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../public/build/img/logo.svg" alt="logotipo de bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="../public/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../public/build/img/dark-luna.svg">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">contacto</a>
                        <?php if ($auth) : ?>
                            <a href="logout.php">Cerrar sesión</a>
                        <?php endif; ?>
                        <?php if (!$auth) : ?>
                            <a href="login.php">Iniciar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>


            </div>
            <?php
            if ($inicio) {
                echo '<h1>Venta de Casas y departamentos de Lujo</h1>';
            }
            ?>

        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">contacto</a>
            </nav>
        </div>

        <?php
        $fecha = date('Y');
        ?>

        <p class="copyright">Todos los derechos Reservados <?php echo $fecha ?> &copy;</p>
    </footer>

    <script src="../public/build/js/bundle.min.js"></script>
</body>

</html>