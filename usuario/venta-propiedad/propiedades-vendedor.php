<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Modulo_inicio.css">
    <title>Venta de propiedad</title>
</head>
<?php

include_once "../modulo/conexion.php";

session_start();

?>

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
                <li class="navbar__element">
                    <a href="propiedades-vendedor.php" class="navbar__link">Mis propiedades</a>
                </li>
                <li class="navbar__element dropdown">
                    <a href="#" class="navbar__link">Propiedades</a>
                    <ul class="dropdown__menu">
                        <li><a href="../carrito.php" class="dropdown__link">Carrito</a></li>
                        <?php
                        if ($_SESSION['tipo_persona'] == '01') {
                            echo '
                        <li><a href="venta.php" class="dropdown__link">Venta</a></li>';
                        }
                        ?>

                        <li><a href="#" class="dropdown__link">Compra</a></li>
                        <li><a href="#" class="dropdown__link">Alquiler</a></li>
                    </ul>
                </li>
                <?php
                if (empty($_SESSION['usuario'])) {
                    echo '
                    <li class="navbar__element navbar__element-ul ">
                        <a href="login.php" class="navbar__link ">Login</a>
                    </li>';
                } else {
                    echo '
                    <li class="navbar__element navbar__element-ul">
                        <a href="" class="navbar__link">' . $_SESSION['usuario'] . '</a>
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
    <br><br><br><br><br><br><br>

    <div class="propiedades">
        <div class="propiedades__encabezado">
            <h1 class="propiedades__encabezado-tittle">¡Mis propiedades!</h1>
            <h2 class="propiedades__encabezado-subtittle">Colviviendas</h2>

        </div>
        <div class="propiedades__container">
            <?php
            $mysql_host = 'localhost';
            $mysql_user = 'root';
            $password = '';

            $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

            $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

            $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion and c.identificacion = '" . $_SESSION['identificacion'] . "';");



            while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

                echo '
                <div class="propiedades__card">
                <div class="propiedades__card-textos">
                    <div class="propiedades__card-textos-container">

                        <h4 class="propiedades__card-textos-titulo">Codigo propiedad</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['codigo_propiedad'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Dirección</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['direccion'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Ciudad</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['ciudad'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Barrio</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['barrio'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Modelo</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['modelo'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Tipo de propiedad</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['tipo_propiedad'] . '</p>

                        </div>

                    <div class="propiedades__card-textos-container">

                        

                        <h4 class="propiedades__card-textos-titulo">Estado</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['estado'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Precio</h4>
                        <p class="propiedades__card-textos-descripcion">$' . number_format($row['precio'], 0, ',', '.') . '</p>

                        <h4 class="propiedades__card-textos-titulo">Metodo de pago</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['descripcion'] . '</p>

                        <h4 class="propiedades__card-textos-titulo">Edad de la propiedad</h4>
                        <p class="propiedades__card-textos-descripcion">' . $row['edad'] . '</p>
                    </div>
                </div>
            

            
            <div class="propiedades__card-imagen">
                <img class="propiedades__card-imagen-img" src="' . $row['foto'] . '">
                </div>
            </div>';
            }
            ?>
        </div>
    </div>


    <footer class=" footer">
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