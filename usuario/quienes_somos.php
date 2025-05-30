<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Modulo_inicio.css">
    <link rel="shortcut icon" href="./img/iconos/quienes.png" type="image/x-icon">
    <title>Nosotros</title>
</head>
<?php
session_start();

?>

<body>
<header class="navbar">
        <nav class="navbar__container">
            <div class="navbar__logo">
                <img src="./img/logo/Logo_colviviendas-recortado.jpg" alt="Logo" class="navbar__logo-img">
            </div>
            <ul class="navbar__menu">
                <li class="navbar__element">
                    <a href="index.php" class="navbar__link">Inicio</a>
                </li>
                <li class="navbar__element">
                    <a href="quienes_somos.php" class="navbar__link">Nosotros</a>
                </li>
                <li class="navbar__element">
                    <a href="./contactenos/contactenos.php" class="navbar__link">Contáctenos</a>
                </li>
                <?php
                if (!empty($_SESSION['usuario'])) {
                    if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                        echo '
                    <li class="navbar__element">
                    <a href="./venta-propiedad/propiedades-vendedor.php" class="navbar__link">Mis propiedades</a></li>';
                    } else {
                        echo '
                        <li class="navbar__element">
                            <a href="./blog/blog.php" class="navbar__link">Blog</a>
                        </li>';
                    }
                }
                ?>
                    <?php

                        if (!empty($_SESSION['usuario'])) {
                            echo'
                            <li class="navbar__element dropdown">
                            <a href="#" class="navbar__link">Propiedades</a>
                            <ul class="dropdown__menu">';

                        
                            echo '<li><a href="carrito.php" class="dropdown__link">Carrito</a></li>';
                        

                        
                            if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                                echo '
                            <li><a href="./venta-propiedad/venta.php" class="dropdown__link">Venta</a></li>';
                            }
                            echo'<li><a href="venta-usuario.php" class="dropdown__link">Compra</a></li>
                                <li><a href="arrendamiento.php" class="dropdown__link">Alquiler</a></li>
                            </ul>
                            </li>';
                        }
                        ?>

                        
                <?php
                if (empty($_SESSION['usuario'])) {
                    echo '
                    <li class="navbar__element navbar__element-ul ">
                        <a href="login.php" class="navbar__link ">Login</a>

                    </li>';
                } else {
                    echo '
                    <li class="navbar__element navbar__element-ul">
                        <a href="usuario.php" class="navbar__link">' . $_SESSION['usuario'] . '</a>
                    </li>';

                    echo '
                    <li class="navbar__element navbar__element-ul ">
                        <a href="cerrar.php" class="navbar__link ">Cerrar</a>
                    </li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <br><br><br><br><br>

    <section class="quienes">
        <div class="quienes__texto">
            <h1 class="quienes__texto-tittle">¿Quienes Somos?</h1>
            <p class="quienes__texto-p">
                Bienvenidos a Colviviendas, su socio confiable en el mundo de los bienes raíces. Desde nuestra fundación
                en 2023, nos hemos dedicado a ofrecer servicios inmobiliarios de alta calidad, siempre enfocados en
                satisfacer las necesidades y expectativas de nuestros clientes.
            </p>
            <p class="quienes__texto-p">
                En Colviviendas, creemos que cada propiedad es única, al igual que cada uno de nuestros clientes.
                Nuestro equipo está compuesto por profesionales experimentados y apasionados, comprometidos con brindar
                una atención personalizada y asesoramiento experto en cada etapa del proceso inmobiliario.
            </p>
            <p class="quienes__texto-p">
                Nos especializamos en la compra, venta y alquiler de propiedades residenciales y comerciales, así como
                en la gestión de propiedades y asesoramiento en inversiones inmobiliarias. Con un profundo conocimiento
                del mercado local y una red extensa de contactos, estamos bien equipados para ayudarle a encontrar la
                propiedad perfecta o a obtener el mejor valor por su inversión.
            </p>


        </div>
        <div class="quienes__imagen">
            <img src="./img/quienes-somos/quienes-somos.jpg" alt="oficina" class="quienes__imagen-img">
        </div>
    </section>
    <section class="info">
        <div class="info__container">
            <div class="info__textos">
                <h1 class="info__textos-tittle">Misión</h1>
                <p class="info__textos-parrafo">Nuestra misión es que las personas logren obtener una propiedad
                    fácilmente, logrando cumplir sus sueños y aspiraciones, disfrutando de un espacio agradable, cómodo
                    y cálido donde puedan formar un hogar.</p>
            </div>
            <div class="info__imagen">
                <img src="./img/quienes-somos/archivar-factura.png" alt="misión" class="info__imagen-img">
            </div>
        </div>
        <div class="info__linea">
            <div class="info__linea-container">

            </div>
        </div>
        <div class="info__container">
            <div class="info__textos">
                <h1 class="info__textos-tittle">Visión</h1>
                <p class="info__textos-parrafo">Queremos expandirnos Mundialmente, ofreciendo nuestros servicios de
                    inmobiliaria. Con esto tener más personas alrededor del mundo disfrutando de sus nuevos hogares,
                    gracias a nuestra empresa.</p>
            </div>
            <div class="info__imagen">
                <img src="./img/quienes-somos/trofeo.png" alt="Visión" class="info__imagen-img">
            </div>
        </div>
        <div class="info__linea">
            <div class="info__linea-container">

            </div>
        </div>
    </section>
    <section class="slogan">
        <h1 class="slogan__tittle">Siempre unidos para encontrar tu verdadero hogar</h1>
    </section>
    <section class="equipo">
        <div class="equipo__inicio">
            <h1 class="equipo__inicio-tittle">¡Nuestro Equipo!</h1>
        </div>
        <div class="equipo__container">
            <div class="equipo__persona">
                <img src="./img/quienes-somos/juan.jpg" alt="Equipo" class="equipo__persona-imagen">
                <h3 class="equipo__persona-subtittle">Juan Esteban Blandón Blandón</h3>
                <p class="equipo__persona-parrafo">Encargado de las vistas del proyecto.</p>

            </div>
            <div class="equipo__persona">
                <img src="./img/quienes-somos/eliana.jpg" alt="Equipo" class="equipo__persona-imagen">
                <h3 class="equipo__persona-subtittle">Eliana Perez Ramos</h3>
                <p class="equipo__persona-parrafo">Encargada de las funcionalidades del proyecto.</p>

            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__politicas">
            <a href="" class="footer__politicas-link">Privacidad</a>
            <a href="" class="footer__politicas-link">Politicas de seguridad</a>
            <a href="" class="footer__politicas-link">Politicas de navegación</a>
        </div>
        <div class="footer__linea">
            <div class="footer__linea-container">

            </div>
        </div>
        </div>
        <div class="footer__redes">
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Telefono</h3>
                    <p class="footer__redes-parrafo">3156069236</p>
                    <img src="./img/iconos/Redes/llamada-telefonica.png" alt="telefono" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Email</h3>
                    <p class="footer__redes-parrafo">colviviendasJuntosparaEncontrartuhogar@gmail.com</p>
                    <img src="./img/iconos/Redes/sobre.png" alt="email" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Twiter</h3>
                    <p class="footer__redes-parrafo">Colviviendas oficial</p>
                    <img src="./img/iconos/Redes/gorjeo.png" alt="twiter" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Facebook</h3>
                    <p class="footer__redes-parrafo">Colviviendas Español</p>
                    <img src="./img/iconos/Redes/facebook.png" alt="facebook" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Instagram</h3>
                    <p class="footer__redes-parrafo">Colviviendas</p>
                    <img src="./img/iconos/Redes/instagram.png" alt="instragram" class="footer__redes-img">
                </div>
            </div>
        </div>
        <div class="footer__linea-redes">
            <div class="footer__linea-container-redes">

            </div>
        </div>
        <div class="footer__copy">
            <div class="footer__copy-text">
                <span class="footer__copy-span">© Copyright - colviviendas 2024</span>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
  const sloganTittle = document.querySelector('.slogan__tittle');

  sloganTittle.addEventListener('mouseover', function() {
    sloganTittle.style.animationPlayState = 'paused';
  });

  sloganTittle.addEventListener('mouseout', function() {
    sloganTittle.style.animationPlayState = 'running';
  });
});

    </script>
</body>

</html>