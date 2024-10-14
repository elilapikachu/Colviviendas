<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Modulo_inicio.css">
    <link rel="shortcut icon" href="./img/iconos/hogar.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Mi perfil</title>
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
    <div class="usuario">

        <div class="usuario__principal">
            <h1 class="usuario__principal-tittle">Mi perfil</h1>
        </div>
        <?php

        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';

        $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

        $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

        $matriz = mysqli_query($dbhandle, "SELECT 
            a.identificacion, 
            a.nombre, 
            a.apellido, 
            a.direccion, 
            a.telefono, 
            b.descripcion, 
            a.fecha_registro, 
            c.descripcion AS tipo_persona, 
            a.contrasena, 
            a.correo, 
            a.foto 
        FROM 
            persona a
        LEFT JOIN 
            ciudad b ON a.ciudad = b.codigo_ciudad
        LEFT JOIN 
            tipo_persona c ON c.codigo_tipo = a.tipo_persona
        WHERE 
            a.identificacion = " . $_SESSION['identificacion'] . ";");


        while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {
            echo '
        <div class="usuario__perfil">
            
            <div class="usuario__textos">
                <img src="' . $row['foto'] . '" alt="user" class="usuario__textos-img">
                <h3 class="usuario__textos-subtittle">Foto</h3>
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Identificación</h3>
                <p class="usuario__textos-p">' . $row['identificacion'] . '</p>
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Nombre</h3>
                <p class="usuario__textos-p">' . $row['nombre'] . '</p>
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Apellidos</h3>
                <p class="usuario__textos-p">' . $row['apellido'] . '</p>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Telefono</h3>';
            if ($row['telefono'] != 0) {
                echo '
                   <p class="usuario__textos-p">' . $row['telefono'] . '</p>';
            } else {
                echo '<p class="usuario__textos-p">Vacío</p>';
            }
            echo '
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Correo</h3>
                <p class="usuario__textos-p">' . $row['correo'] . '</p>
            </div>
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Ciudad</h3>';

            if (!empty($row['descripcion'])) {
                echo '
                <p class="usuario__textos-p">' . $row['descripcion'] . '</p>';
            } else {
                echo '<p class="usuario__textos-p">Vacío</p>';
            }
            echo '
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Dirección</h3>';
            if (!empty($row['direccion'])) {
                echo '
                <p class="usuario__textos-p">' . $row['direccion'] . '</p>';
            } else {
                echo '<p class="usuario__textos-p">Vacío</p>';
            }
            echo '
            </div>
            <div class="usuario__textos">
                <h3 class="usuario__textos-subtittle">Tipo de persona</h3>
                <p class="usuario__textos-p">' . $row['tipo_persona'] . '</p>
            </div>
            <button class="boton" id="myBtn">Modificar perfil</button>
        </div>';
        }
        ?>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Editar mi perfil</h2>
                <form action="usuario-edit.php" method="POST" enctype="multipart/form-data">
                <?php
                
                $mysql_host = 'localhost';
                $mysql_user = 'root';
                $password = '';
            
                $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');
            
                $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");
            
                $matriz = mysqli_query($dbhandle, "SELECT 
                  a.identificacion, 
                  a.nombre,
                  c.codigo_tipo,
                  a.ciudad, 
                  a.apellido, 
                  a.direccion, 
                  a.telefono, 
                  b.descripcion, 
                  a.fecha_registro, 
                  c.descripcion AS tipo_persona, 
                  a.contrasena, 
                  a.correo, 
                  a.foto 
                  FROM 
                    persona a
                  LEFT JOIN 
                    ciudad b ON a.ciudad = b.codigo_ciudad
                  LEFT JOIN 
                    tipo_persona c ON c.codigo_tipo = a.tipo_persona
                  WHERE
                   a.identificacion =" . $_SESSION['identificacion'] . ";");
            
                while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {
                  echo '<label for="identificacion" class="label_modal">Numero de identificación</label>';
                  echo "<input class='input_modal' type='text' id='identificacion' name='identificacion' value='" . $row['identificacion'] . "' readonly>";
            
                  echo '<label for="Nombre" class="label_modal">Nombre</label>';
                  echo "<input class='input_modal' type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "'>";
            
                  echo '<label for="Apellido" class="label_modal">Apellido</label>';
                  echo "<input class='input_modal' type='text' id='apellido' name='apellido' value='" . $row['apellido'] . "'>";
            
                  echo '<label for="Direccion" class="label_modal">Dirección</label>';
                  echo "<input class='input_modal' type='text' id='direccion' name='direccion' value='" . $row['direccion'] . "'>";
            
                  echo '<label for="telefono" class="label_modal">Telefono</label>';
                  echo "<input class='input_modal' type='text' id='telefono' name='telefono' value='" . $row['telefono'] . "'>";
            
                  echo '<label for="ciudad" class="label_modal">Ciudad</label>';
                  // echo "<input type='text' id='ciudad' name='ciudad' value=''>";
                
            
                  try {
                    // Ejecutando sql
                
                    $matriz1 = $conexion->query("select codigo_ciudad, descripcion from ciudad Order by codigo_ciudad");
            
                    echo "<select id=ciudad name=ciudad class='input_modal'>";
                    while ($row1 = $matriz1->fetch()) {
            
                      if ($row1['codigo_ciudad'] == $row['ciudad']) {
            
                        echo "<option value=" . $row1['codigo_ciudad'] . " selected>"  . $row1['descripcion'] . "</option>";
                      } else {
            
                        echo "<option value=" . $row1['codigo_ciudad'] . ">"  . $row1['descripcion'] . "</option>";
                      }
                    }
                  } catch (PDOException $e) {
                    //Cada de que ocurra algun error
                    echo "Fallo el select " . $e->getMessage();
                  }
            
                  echo "</select>";
                
                  echo '<label for="tipo" class="label_modal">Tipo de persona</label>';
                  // echo "<input type='text' id='tipo' name='tipo' value=''>";
                  try {
                    // Ejecutando sql
                
                    $matriz1 = $conexion->query("select * from tipo_persona where codigo_tipo != '03' Order by codigo_tipo");
            
                    echo "<select id=tipo name=tipo class='input_modal'>";
                    while ($row1 = $matriz1->fetch()) {
            
                      if ($row1['codigo_tipo'] == $row['codigo_tipo']) {
            
                        echo "<option value=" . $row1['codigo_tipo'] . " selected>" . $row1['descripcion'] . "</option>";
                      } else {
            
                        echo "<option value=" . $row1['codigo_tipo'] . ">" . $row1['descripcion'] . "</option>";
                      }
                    }
                  } catch (PDOException $e) {
                    //Cada de que ocurra algun error
                    echo "Fallo el select " . $e->getMessage();
                  }
            
                  echo "</select>";
            
                  echo '<label for="contraseña" class="label_modal" >Contraseña</label>';
                  echo "<input class='input_modal' type='password' id='contrasena' name='contrasena' value='" . $row['contrasena'] . "'>";
            
                  echo '<label for="Email" class="label_modal" >Correo electronico</label>';
                  echo "<input class='input_modal' type='Email' id='email' name='email' value='" . $row['correo'] . "'>";
            
                  echo '<label class="label_modal" for="foto" >Foto</label>';
                  echo "<input type='file' id='foto' name='foto' value=''>";
                }

            
                echo '<button class="boton_modal" type="submit">Modificar</button>';
                echo '</form>';
                ?>
                
            </div>
        </div>
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
<script>
    // Obtener el modal
    var modal = document.getElementById("myModal");

    // Obtener el botón que abre el modal
    var btn = document.getElementById("myBtn");

    // Obtener el elemento <span> que cierra el modal
    var span = document.getElementsByClassName("close")[0];

    // Cuando el usuario hace clic en el botón, abre el modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Cuando el usuario hace clic en <span> (x), cierra el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic fuera del modal, también se cierra
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>

</html>