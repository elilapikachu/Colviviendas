<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Modulo_inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Alquiler</title>
</head>
<?php

include_once "../modulo/conexion.php";

session_start();

if (empty($_SESSION['identificacion'])) {
    echo '
      <script>
      alert("Debe iniciar sesion o registrarse para acceder aqui.");
      window.location.href="login.php";
      </script>';
}

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
                    echo '
                            <li class="navbar__element dropdown">
                            <a href="#" class="navbar__link">Propiedades</a>
                            <ul class="dropdown__menu">';


                    echo '<li><a href="carrito.php" class="dropdown__link">Carrito</a></li>';



                    if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                        echo '
                            <li><a href="./venta-propiedad/venta.php" class="dropdown__link">Venta</a></li>';
                    }
                    echo '<li><a href="venta-usuario.php" class="dropdown__link">Compra</a></li>
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

    <div class="alquiler__principal">
        <div class="alquiler__principal-textos">
            <h1 class="alquiler__principal-tittle">Bienvenido a Alquiler de propiedades</h1>
            <h3 class="alquiler__principal-subtittle">Calidad alta en propiedades para arrendar, disfruta de las
                propiedades que tenemos para ofrecerte.</h3>
        </div>
    </div>

    <div class="container-vender">
        <?php
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';

        $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

        $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

        $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion, a.nro_banos, a.nro_habitaciones, a.nro_garajes, a.nro_metros, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion and a.estado != 'E2' and a.estado != 'E3' and a.destinacion = '20';");



        while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {
            $fecha_registro_datetime = new DateTime($row['fecha_registro']);
            $fecha_actual = new DateTime(); // Fecha y hora actuales
        
            $interval = $fecha_registro_datetime->diff($fecha_actual);

            echo '<div class="horizontal-card">
            <div class="horizontal-card__img-container">
                <img src="' . $row['foto'] . '" alt="Casa en Venta" class="horizontal-card__img">
            </div>
            <div class="horizontal-card__content">
                <div class="horizontal-card__header">
                    <h3 class="horizontal-card__title">Casa de ' . $row['nombre'] . ' ' . $row['apellido'] . '</h3>
                    <p class="horizontal-card__price">' . number_format($row['precio'], 0, ',', '.') . '$</p>
                </div>
                <p class="horizontal-card__location"><i class="fas fa-map-marker-alt"></i> ' . $row['ciudad'] . ', Colombia</p>
                <ul class="horizontal-card__info">
                    <li><i class="fas fa-ruler-combined"></i>' . $row['nro_metros'] . 'm²</li>
                    <li><i class="fas fa-bed"></i> ' . $row['nro_habitaciones'] . ' Habitaciones</li>
                    <li><i class="fas fa-bath"></i> ' . $row['nro_banos'] . ' Baños</li>
                    <li><i class="fas fa-car"></i> ' . $row['nro_garajes'] . ' Garaje</li>
                </ul>';
            if ($interval->y > 0) {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace ' . $interval->y . ' años</p>';
            } elseif ($interval->m > 0) {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace ' . $interval->m . ' meses</p>';
            } elseif ($interval->d > 0) {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace ' . $interval->d . ' días</p>';
            } elseif ($interval->h > 0) {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace ' . $interval->h . ' horas</p>';
            } elseif ($interval->i > 0) {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace ' . $interval->i . ' minutos</p>';
            } else {
                echo '<p class="horizontal-card__published"><i class="fas fa-clock"></i> Publicado hace menos de un minuto</p>';
            }

            echo '
            </div>
        </div>';
        }
        ?>
    </div>


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

</body>

</html>