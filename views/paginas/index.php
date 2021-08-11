<main class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <div class="icono-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti vel porro qui. Totam corrupti ab
                nulla? Numquam impedit minus quo fugit labore! Adipisci, illum omnis! Exercitationem voluptatem
                itaque explicabo eveniet?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti vel porro qui. Totam corrupti ab
                nulla? Numquam impedit minus quo fugit labore! Adipisci, illum omnis! Exercitationem voluptatem
                itaque explicabo eveniet?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti vel porro qui. Totam corrupti ab
                nulla? Numquam impedit minus quo fugit labore! Adipisci, illum omnis! Exercitationem voluptatem
                itaque explicabo eveniet?</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Ventas</h2>

    <?php
    $limite = 3;
    include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Var Todas</a>
    </div>
</section>

<seccion class="imagen-contacto">
    <h2>encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a class="boton boton-amarillo" href="contacto.php">Contactanos</a>
</seccion>

<div class="contenedor seccion seccion-inferior">
    <seccion class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <source srcset="build/img/blog1.png" type="image/png">
                    <img loading="lazy" src="build/img/blog1.png" alt="texto entrada blog">

                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para construir un terraza em el techo de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <source srcset="build/img/blog2.png" type="image/png">
                    <img loading="lazy" src="build/img/blog2.png" alt="texto entrada blog">

                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu hogas</h4>
                    <p>escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar cpn esta guia, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </seccion>

    <seccion class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                el personal se comporto de uan excelente forma, muy buena atencion y la casa que le ofrecieron
                cumple con todas mis espectativas
            </blockquote>
            <p>- Carlos Tucno</p>
        </div>
    </seccion>
</div>