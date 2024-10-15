<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Modulo_inicio.css">
    <link rel="shortcut icon" href="./img/iconos/hogar.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Index</title>
</head>
<?php

include_once "../modulo/conexion.php";

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
    <main>
        <br><br><br><br><br><br><br><br>

        <div class="carousel">
            <div class="carousel__cartel">
                <?php
                if (!empty($_SESSION['usuario'])) {
                    echo '
                <div class="carousel__cartel-texto">
                    <h1 class="carousel__cartel-tittle">Bienvenido ' . $_SESSION['usuario'] . '</h1>
                    <p class="carousel__cartel-parrafo">Colviviendas</p>
                </div>';
                }
                ?>
            </div>
            <div class="slides">
                <center>
                    <a href="#">
                        <img class="media" src="./img/casa 1.jpg" alt="Imagen 1"
                            style="width: 700px;height: 400px;margin-left: 160px; margin-right: 60px; border-radius: 10px;">
                    </a>
                </center>
                <center>
                    <a href="#">
                        <img class="media" src="./img/casa 2.jpg" alt="Imagen 2"
                            style="width:600px; height: 400px; margin-left: 210px; margin-right: 60px; border-radius: 10px;">
                    </a>
                </center>
                <center>
                    <a href="#">
                        <img class="media" src="./img/casa 3.jpg" alt="Imagen 3"
                            style="width: 600px; height: 400px;margin-left: 250px; margin-right: 60px; border-radius: 10px;">
                    </a>
                </center>
                <center>
                    <a href="#">
                        <img class="media" src="./img/casa 9.jpeg" alt="Imagen 4"
                            style="width: 600px; height: 400px;margin-left: 300px; margin-right: 60px; border-radius: 10px;">
                    </a>
                </center>

            </div>
            <div class="navigation">
                <button id="prev">&lt;</button>
                <button id="next">&gt;</button>
            </div>


        </div>

        <section class="servicios">
            <div class="servicios__descripcion">
                <h1 class="servicios__descripcion-tittle">¡Nuestros servicios!</h1>
                <p class="servicios__descripcion-parrafo">
                    Bienvenido a colviviendas. En esta sección te diremos nuestros servicios y productos.
                </p>
            </div>
            <div class="servicios__cards">
                <div class="servicios__card-content" data-aos="flip-down">
                    <div class="servicios__card-textos">
                        <h3 class="servicios__card-tittle">Venta y Compra de propiedades</h3>
                        <p class="servicios_card-parrafo">
                            Ofrecemos un servicio integral para la compra y venta de casas, asegurando transparencia y
                            eficiencia.
                            Nuestro equipo te guía desde la evaluación hasta el cierre de la transacción, garantizando
                            una experiencia segura y exitosa.
                        </p>

                        <img src="./img/iconos/carrito-de-compras.png" alt="icono" class="servicios__card-img">
                    </div>
                </div>
                <div class="servicios__card-content" data-aos="flip-down">
                    <div class="servicios__card-textos">
                        <h3 class="servicios__card-tittle">Arrendamiento de Propiedades</h3>
                        <p class="servicios_card-parrafo">
                            Proveemos un servicio completo de arrendamiento de propiedades, facilitando la gestión de
                            alquileres con transparencia y eficiencia.
                            Aseguramos una experiencia segura y satisfactoria para propietarios e inquilinos.
                        </p>
                        <img src="./img/iconos/usuarios-alt.png" alt="icono" class="servicios__card-img">
                    </div>
                </div>
                <div class="servicios__card-content" data-aos="flip-down">
                    <div class="servicios__card-textos">
                        <h3 class="servicios__card-tittle">Asesorias inmobiliarias</h3>
                        <p class="servicios_card-parrafo">
                            Nuestro equipo de expertos brinda análisis detallados y recomendaciones personalizadas para
                            ayudarte a tomar decisiones informadas y maximizar el valor de tus inversiones.
                        </p>
                        <img src="./img/iconos/llamada-telefonica (1).png" alt="icono" class="servicios__card-img">
                    </div>
                </div>
            </div>
        </section>
        <div class="buscar">

            <h1 class="buscar__tittle" data-aos="flip-up">
                Buscar Inmuebles
            </h1>
            <form class="buscar__form" action="venta-usuario.php?cod=buscar" method="POST">

                <div class="buscar__select">
                    <select class="form-select" name="tipo" aria-label="Default select example" >
                        <option value="">Tipo de propiedad</option>
                        <?php
                        try {
                            // Ejecutando sql
                        
                            $matriz = $conexion->query("select * from tipo_propiedad Order by codigo_tipo;");
                            while ($row = $matriz->fetch()) {
                                echo "<option value=" . $row['codigo_tipo'] . ">" . $row['descripcion'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            //Cada de que ocurra algun error
                            echo "Fallo el select " . $e->getMessage();
                        }
                        ?>
                    </select>
                </div>
                
                <div class="buscar__select">
                    <select class="form-select" name="barrio" aria-label="Default select example">
                        <option value="">Barrio</option>
                        <?php
                        try {
                            // Ejecutando sql
                        
                            $matriz = $conexion->query("select * from barrio Order by codigo_barrio;");
                            while ($row = $matriz->fetch()) {
                                echo "<option value=" . $row['codigo_barrio'] . ">" . $row['descripcion'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            //Cada de que ocurra algun error
                            echo "Fallo el select " . $e->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <div class="buscar__select">
                    <select class="form-select" name="ciudad" aria-label="Default select example">
                        <option value="">Ciudad</option>
                        <?php
                        try {
                            // Ejecutando sql
                        
                            $matriz = $conexion->query("select * from ciudad Order by codigo_ciudad;");
                            while ($row = $matriz->fetch()) {
                                echo "<option value=" . $row['codigo_ciudad'] . ">" . $row['descripcion'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            //Cada de que ocurra algun error
                            echo "Fallo el select " . $e->getMessage();
                        }
                        ?>
                    </select>
                </div>

                <div class="buscar__input">
                    <input type="int" class="buscar__input-text" name="habitacion" placeholder="Habitaciones">
                </div>
                
                <div class="buscar__input">
                    <input type="int" class="buscar__input-text" name="bano" placeholder="Baños">
                </div>
                <div class="buscar__input">
                    <input type="submit" class="buscar__input-text"  value="Buscar">
                </div>
            </form>
        </div>
        <div class="favoritos">

            <div class="favoritos__tittle">
                <h1 class="favoritos__tittle-text">
                    Favoritos
                </h1>
            </div>
            <div class="favoritos__cards">
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Extensa propiedad frente al mar, con acceso directo a la arena. Perfecta para construir una casa de vacaciones o realizar actividades recreativas. El entorno natural ofrece tranquilidad y vistas espectaculares al océano.
                        </p>
                        <img src="./img/casa 3.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Propiedad de grandes dimensiones diseñada para la cría de ganado. Cuenta con abundantes pastos y una fuente natural de agua. El terreno está dividido en áreas de pastoreo y cercado para facilitar la gestión del ganado.
                        </p>
                        <img src="./img/casa 4.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Hermoso lago en una propiedad privada, ideal para la pesca o deportes acuáticos. Rodeado de paisajes pintorescos y zonas de acampada. Un lugar único para disfrutar de la tranquilidad en contacto con la naturaleza.
                        </p>
                        <img src="./img/casa 5.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Terreno fértil listo para cultivos, equipado con un sistema de riego moderno. Ideal para agricultura sostenible o plantaciones de gran escala. Ubicada cerca de una carretera principal para fácil acceso al transporte de mercancías.
                        </p>
                        <img src="./img/casa 6.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Extensión de terreno con viñas maduras y equipamiento para la producción de vino. Perfecto para amantes de la viticultura o inversores en el sector. Ubicación ideal con un microclima favorable para una excelente cosecha.
                        </p>
                        <img src="./img/casa 7.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                        Propiedad arbolada con senderos naturales ideales para caminatas y actividades al aire libre. Un refugio de naturaleza con flora y fauna autóctona. Perfecto para conservar o disfrutar como espacio recreativo.
                        </p>
                        <img src="./img/casa 8.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
            </div>
        </div>

    </main>
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
    <script src="./js/carrusel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>