<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Modulo_inicio.css">
    <link rel="shortcut icon" href="../img/iconos/blog.png" type="image/x-icon">
    <title>Blog</title>
</head>
<?php

include_once "../modulo/conexion.php";

session_start();

if (empty($_SESSION['identificacion'])) {
    echo '
      <script>
      alert("Debe iniciar sesion o registrarse para acceder aqui.");
      window.location.href="../login.php";
      </script>';
}
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
                <?php
                if (!empty($_SESSION['usuario'])) {
                    if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                        echo '
                    <li class="navbar__element">
                    <a href="../venta-propiedad/propiedades-vendedor.php" class="navbar__link">Mis propiedades</a></li>';
                    } else {
                        echo '
                        <li class="navbar__element">
                            <a href="./blog.php" class="navbar__link">Blog</a>
                        </li>';
                    }
                }
                ?>

                <li class="navbar__element dropdown">
                    <a href="#" class="navbar__link">Propiedades</a>
                    <ul class="dropdown__menu">

                        <?php

                        if (!empty($_SESSION['usuario'])) {
                            echo '<li><a href="../carrito.php" class="dropdown__link">Carrito</a></li>';
                        }

                        if (!empty($_SESSION['usuario'])) {
                            if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                                echo '
                            <li><a href="../venta-propiedad/venta.php" class="dropdown__link">Venta</a></li>';
                            }
                        }
                        ?>

                        <li><a href="../venta-usuario.php" class="dropdown__link">Compra</a></li>
                        <li><a href="../arrendamiento.php" class="dropdown__link">Alquiler</a></li>
                    </ul>
                </li>
                <?php
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

    <main class="blog">
        <div class="blog__principal">
            <div class="blog__principal_textos">
                <h1 class="blog__principal-tittle">¡Bienvenido al blog!</h1>
                <p class="blog__principal-texto">En Colviviendas, nos apasiona ayudarte a encontrar el hogar perfecto.
                    En este espacio, compartimos consejos prácticos, tendencias del mercado y todo lo que necesitas
                    saber
                    para hacer una inversión segura. Acompáñanos y descubre cómo hacer realidad tus sueños
                    inmobiliarios.</p>
            </div>
        </div>

        <section class="blog__consejos">
            <div class="blog__consejos_principal">
                <h1 class="blog__consejos_principal-tittle">Consejos</h1>
                <p class="blog__consejos_principal-texto">Aqui podras leer consejos sobre como comprar o arrendar una
                    propiedad, leelos con cuidado
                    pueden ser muy utiles a la hora de tomar una desición.
                </p>

            </div>
            <div class="blog__consejos-container">
                <div class="blog__consejos-card">
                    <h2 class="blog__consejos-card-tittle">
                        ¡A la hora de comprar!
                    </h2>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Determina tu presupuesto:</b> Antes de comenzar la búsqueda, define cuánto puedes gastar. Ten en
                        cuenta no solo el precio de compra, sino también los gastos adicionales como impuestos, seguros
                        y mantenimiento.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Evalúa la ubicación:</b> La ubicación es uno de los factores más importantes en una compra
                        inmobiliaria. Investiga sobre la seguridad, la cercanía a servicios como escuelas, transporte,
                        supermercados y zonas de recreación.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Verifica el estado de la propiedad:</b> Haz una inspección exhaustiva. Una casa que parece perfecta
                        podría tener problemas ocultos, como tuberías en mal estado o humedad. Considera contratar un
                        experto para que realice una inspección técnica.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Revisa la documentación:</b> Asegúrate de que los títulos de propiedad estén en regla, sin deudas
                        pendientes, hipotecas ocultas o problemas legales. Revisa también los permisos de construcción
                        si se han realizado modificaciones.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Considera la plusvalía a largo plazo:</b> Investiga sobre la evolución de precios en la zona.
                        Algunas áreas tienden a revalorizarse, lo que puede ser una buena inversión a futuro.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">
                        Negocia el precio:</b> La primera oferta del vendedor no tiene por qué ser la definitiva. Basado en
                        la investigación del mercado, puedes negociar para obtener un mejor precio.
                    </p>
                </div>
                <div class="blog__consejos-card">
                    <h2 class="blog__consejos-card-tittle">
                        ¡A la hora de Arrendar!
                    </h2>
                    <p class="blog__consejos-card-text">
                        <b class="blog__consejos-card-b">Establece un presupuesto claro:</b> Al igual que al comprar, es
                        esencial tener claro cuánto
                        puedes
                        gastar mensualmente en el alquiler. Considera que el alquiler no debe superar un porcentaje
                        prudente de tus ingresos (generalmente el 30%).
                    </p>
                    <p class="blog__consejos-card-text">
                        <b class="blog__consejos-card-b">Revisa el contrato detenidamente:</b> Antes de firmar,
                        asegúrate de entender todas las cláusulas,
                        incluidas las condiciones de renovación, aumentos de renta, y los derechos y responsabilidades
                        tanto del arrendatario como del propietario.
                    </p>
                    <p class="blog__consejos-card-text">
                        <b class="blog__consejos-card-b">Realiza un inventario detallado:</b> Antes de mudarte, realiza
                        un inventario completo de la
                        propiedad, documentando cualquier defecto o desperfecto preexistente. Esto evitará futuros
                        conflictos sobre daños cuando termines el contrato.
                    </p>
                    <p class="blog__consejos-card-text">
                        <b class="blog__consejos-card-b">Investiga la zona:</b> Al igual que en la compra, es crucial
                        investigar la ubicación. Verifica la
                        seguridad, los servicios disponibles, y el nivel de ruido, especialmente si planeas arrendar por
                        un largo periodo.
                    </p>
                    <p class="blog__consejos-card-text">
                        <b class="blog__consejos-card-b">
                            Pregunta sobre las condiciones del mantenimiento:</b> Asegúrate de saber qué gastos cubre el
                        propietario y cuáles son responsabilidad tuya. Por ejemplo, el mantenimiento de
                        electrodomésticos o arreglos de plomería.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">Verifica la solvencia del propietario:</b> Asegúrate de que el propietario sea una persona de
                        confianza. Puedes investigar si hay posibles deudas pendientes sobre la propiedad que puedan
                        afectarte durante el tiempo de alquiler.
                    </p>
                    <p class="blog__consejos-card-text">
                    <b class="blog__consejos-card-b">Consulta las condiciones de salida:</b> Asegúrate de conocer los términos bajo los cuales puedes
                        terminar el contrato, si puedes renovarlo, y bajo qué condiciones puedes recuperar tu depósito.
                    </p>
                </div>
            </div>
        </section>
        <section class="blog__comentarios">
            <div class="blog__comentarios_principal">
                <h1 class="blog__comentarios_principal-tittle"></h1>
            </div>
            <form action="enviar_comentario.php" class="blog__comentarios-form" method="POST">
                <div class="blog__comentarios-input">

                    <label class="blog__comentarios-input-label" for="comentario">Ingresa tu comentario.(<span
                            id="span">0</span> /350) </label>

                    <textarea class="blog__comentarios-input-text" type="text" id="input" name="comentario"></textarea>

                    <input class="blog__comentarios-input-boton" type="submit" value="Enviar">
                </div>
                </div>
            </form>
            <div class="blog__comentarios-container">


                <?php

                $conexion = mysqli_connect("localhost", "root", "", "colviviendas");
                $resultado = mysqli_query($conexion, 'SELECT persona.nombre, persona.apellido, persona.foto , comentarios.comentario, comentarios.fecha FROM comentarios, persona where persona.identificacion = comentarios.usuario;');

                while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

                    echo '
                   
                    <div class="blog__comentarios-comentario">
                    <div class="blog__comentarios-comentario-foto">
                        <img src="' . $row['foto'] . '" alt="foto usuario" class="blog__comentarios-comentario-foto-img">
                    </div>
                    <div class="blog__comentarios-comentario-textos">
                        <h4>' . $row['nombre'] . " " . $row['apellido'] . '</h4>
                        <p class="blog__comentarios-comentario-textos-text">' . $row['comentario'] . '</p>
                    </div>
                    
                    </div>';


                }

                ?>
            </div>
        </section>

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
<script src="../js/tope-texto.js">
</script>

</html>