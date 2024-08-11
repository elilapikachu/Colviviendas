<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./img/iconos/hogar.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <title>Index</title>
</head>

<body>
    <header class="navbar">
        <?php
        session_start();

        ?>
        <nav class="navbar__container">
            <div class="navbar__logo">
                <img src="./img/logo/Logo_colviviendas.jpeg" alt="Logo" class="navbar__logo-img">
            </div>
            <ul class="navbar__menu">
                <li class="navbar__elemet">
                    <a href="index.php" class="navbar__link">Inicio</a>
                </li>
                <li class="navbar__element">
                    <a href="" class="navbar__link">¿Quienes somos?</a>
                </li>
                <li class="navbar__element">
                    <a href="./contactenos/contactenos.php" class="navbar__link">Contactenos</a>
                </li>
                <li class="navbar__element">
                    <a href="" class="navbar__link">Blog</a>
                </li>
                <li class="navbar__element navbar__element-ul">
                    <a href="" class="navbar__link">Propiedades</a>

                </li>
                <?php
                if (empty($_SESSION['usuario'])) {
                    echo '
                <li class="navbar__element navbar__element-ul">
                    <a href="login.php" class="navbar__link">Login</a>

                </li>';
                }
                ?>
                <?php
                if (!empty($_SESSION['usuario'])) {
                    echo '
                <li class="navbar__element navbar__element-ul">
                    <a href="cerrar.php" class="navbar__link">Cerrar</a>

                </li>';
                }
                ?>
            </ul>
        </nav>

    </header>
    <main>
        <br><br><br><br><br><br><br><br><br><br><br><br>

        <div class="carousel" style="padding: 10px; border: 1px solid #000; width: 100%;">
            <div class="carousel__cartel">
                <?php
                if (!empty($_SESSION['usuario'])) {
                    echo '
                <div class="carousel__cartel-texto">
                    <h1 class="carousel__cartel-tittle">Bienvenido ' . $_SESSION['usuario'] . '</h1>
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
            <br>
            <h1 class="buscar__tittle" data-aos="flip-up">
                Buscar Inmuebles
            </h1>
            <div class="buscar__form" data-aos="flip-right">

                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__input">
                    <input type="text" class="buscar__input-text" placeholder="Busca aqui..">
                </div>
                <div class="buscar__select">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
                        </p>
                        <img src="./img/casa 3.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
                        </p>
                        <img src="./img/casa 4.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
                        </p>
                        <img src="./img/casa 5.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
                        </p>
                        <img src="./img/casa 6.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
                        </p>
                        <img src="./img/casa 7.jpg" alt="casa" class="favoritos__card-img">
                    </div>
                </div>
                <div class="favoritos__card-content">
                    <div class="favoritos__card-textos">
                        <h3 class="favoritos__card-tittle">Propiedad popular</h3>
                        <p class="favoritos_card-parrafo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem eos
                            quibusdam, tempore animi perspiciatis optio adipisci rerum maiores ullam, consequuntur
                            consectetur. Tenetur eligendi unde praesentium inventore ducimus id veniam!
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