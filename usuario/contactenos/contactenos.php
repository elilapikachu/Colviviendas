<?php
session_start();

// solo ejecuta cuando todas los campos de la forma están llenos
//por eso pregunto si todos son diferentes de vacío

if (!empty($_GET["mensaje"]) && !empty($_GET["nombre"]) && !empty($_GET["correo"]) && !empty($_GET["tel"]) && !empty($_GET["asunto"])) {

    $recibe = $_GET["correo"] . ",colviviendasjuntosportuhogar@gmail.com";
    $asunto = "Contacto con la empresa Colviviendas"; // cambiar el asunto según el proyecto
    $cuerpo = "Se recibe correo con el siguiente contenido:  " . $_GET["asunto"] . "," . $_GET["mensaje"] . "," . $_GET["nombre"] . "," . $_GET["tel"] . "," . $_GET["correo"];
    $envia = "From:colviviendasjuntosportuhogar@gmail.com";// el correo que crearon del proyecto

    if (mail($recibe, $asunto, $cuerpo, $envia)) {

        unset($_GET["asunto"]);
        unset($_GET["nombre"]);
        unset($_GET["mensaje"]);
        unset($_GET["correo"]);
        echo ' <script>
             alert("Email enviado con éxito ¡Gracias por contactarnos!");
              </script>';
        // header("location: contactenos2.php");

    } else {
        echo "Lo lamento el correo no se envió con exito revise de nuevo los datos";
    }


} else {
    // echo '<script>alert("Debe llenar todos los campos.");</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/iconos/globo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/modulo_inicio.css">
    <title>Contáctenos</title>

</head>

<body>
    <header class="navbar">
        <nav class="navbar__container">
            <div class="navbar__logo">
                <img src="../img/logo/Logo_colviviendas-recortado.jpg" alt="Logo" class="navbar__logo-img">
            </div>
            <ul class="navbar__menu">
                <li class="navbar__element">
                    <a href="../index.php" class="navbar__link">Inicio</a>
                </li>
                <li class="navbar__element">
                    <a href="../quienes_somos.php" class="navbar__link">Nosotros</a>
                </li>
                <li class="navbar__element">
                    <a href="../contactenos/contactenos.php" class="navbar__link">Contáctenos</a>
                </li>
                <?php
                if (!empty($_SESSION['usuario'])) {
                    if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                        echo '
                    <li class="navbar__element">
                    <a href="../venta-propiedad/propiedades-vendedor.php" class="navbar__link">Mis propiedades</a></li>';
                    } else {
                        echo '
                        <li class="navbar__element">
                            <a href="../blog/blog.php" class="navbar__link">Blog</a>
                        </li>';
                    }
                }


                if (!empty($_SESSION['usuario'])) {
                    echo '
                <li class="navbar__element dropdown">
                    <a href="#" class="navbar__link">Propiedades</a>
                    <ul class="dropdown__menu">';



                    if (!empty($_SESSION['usuario'])) {
                        echo '<li><a href="../carrito.php" class="dropdown__link">Carrito</a></li>';
                    }

                    if (!empty($_SESSION['usuario'])) {
                        if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                            echo '
                            <li><a href="../venta-propiedad/venta.php" class="dropdown__link">Venta</a></li>';
                        }
                    }

                    echo '
                        <li><a href="../venta-usuario.php" class="dropdown__link">Compra</a></li>
                        <li><a href="../arrendamiento.php" class="dropdown__link">Alquiler</a></li>
                    </ul>
                </li>';
                }

                if (empty($_SESSION['usuario'])) {
                    echo '
                    <li class="navbar__element navbar__element-ul ">
                        <a href="../login.php" class="navbar__link ">Login</a>

                    </li>';
                } else {
                    echo '
                    <li class="navbar__element navbar__element-ul">
                        <a href="../usuario.php" class="navbar__link">' . $_SESSION['usuario'] . '</a>
                    </li>';

                    echo '
                    <li class="navbar__element navbar__element-ul ">
                        <a href="../cerrar.php" class="navbar__link ">Cerrar</a>
                    </li>';
                }
                ?>
            </ul>
        </nav>
    </header>


    <br><br><br><br><br>
    <div class="contactenos__texto">
        <h1 class="contactenos__texto-h1"> Contáctenos </h1>
    </div>
    <main class="main-contactenos">

        <form class="contactenos-form" id='miforma' action='contactenos.php' method='GET'>

            <label for='asunto'>Asunto:</label>
            <select id="asunto" name="asunto">
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
                <option value="Sugerencia">Pregunta-Sugerencia</option>

            </select>
            <br><br>

            <label for='nombre'>Nombres Completos:</label>
            <input type='text' id='nombre' name='nombre' value='' required><br><br>

            <label for='tel'>Teléfono:</label>
            <input type='text' id='tel' name='tel' value='' required><br><br>


            <label for='correo'>Su Correo Electrónico:</label>
            <input type='email' id='correo' name='correo' value='' required><br><br>


            <label for='mensaje'>Mensaje:</label>
            <textarea id='mensaje' name='mensaje' rows="10" cols="30" value='' required></textarea>
            <br><br>

            <input id='boton' type='submit' value='Enviar'><br><br>



        </form>
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
                    <img src="../img/iconos/Redes/llamada-telefonica.png" alt="telefono" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Email</h3>
                    <p class="footer__redes-parrafo">colviviendasJuntosparaEncontrartuhogar@gmail.com</p>
                    <img src="../img/iconos/Redes/sobre.png" alt="email" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Twiter</h3>
                    <p class="footer__redes-parrafo">Colviviendas oficial</p>
                    <img src="../img/iconos/Redes/gorjeo.png" alt="twiter" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Facebook</h3>
                    <p class="footer__redes-parrafo">Colviviendas Español</p>
                    <img src="../img/iconos/Redes/facebook.png" alt="facebook" class="footer__redes-img">
                </div>
            </div>
            <div class="footer__redes-container">
                <div class="footer__redes-textos">
                    <h3 class="footer__redes-tittle">Instagram</h3>
                    <p class="footer__redes-parrafo">Colviviendas</p>
                    <img src="../img/iconos/Redes/instagram.png" alt="instragram" class="footer__redes-img">
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

</body>

</html>