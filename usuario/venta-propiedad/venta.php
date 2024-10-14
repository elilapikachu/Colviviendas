<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Modulo_inicio.css">
  <title>Vender</title>
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

        <li class="navbar__element">
          <a href="propiedades-vendedor.php" class="navbar__link">Mis Propiedades</a>
        </li>
        <li class="navbar__element dropdown">
          <a href="#" class="navbar__link">Propiedades</a>
          <ul class="dropdown__menu">
            <li><a href="../carrito.php" class="dropdown__link">Carrito</a></li>
            <li><a href="venta.php" class="dropdown__link">Venta</a></li>
            <li><a href="../venta-usuario.php" class="dropdown__link">Compra</a></li>
            <li><a href="../arrendamiento.php" class="dropdown__link">Alquiler</a></li>
          </ul>
        </li>
        <?php
        if (empty($_SESSION['usuario'])) {
          echo '
          <li class="navbar__element navbar__element-ul">
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
  <div class="venta-propiedad">
    <form action="venta-sql.php" class="venta-propiedad__form" method="POST" enctype="multipart/form-data">
      <div class="venta-propiedad__inputs">
        <?php

        echo '<label for="direccion">Direccion de la propiedad</label>';
        echo "<input type='text' id='direccion' name='direccion' value=''>";

        echo '<label for="foto" >Foto de la propiedad</label>';
        echo "<input type='file' id='foto' name='foto' value=''>";

        echo '<label for="estado" >Estado de la propiedad</label>';
        // echo "<input type='text' id='estado' name='estado' value=''>";
        
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from estado where codigo_estado !='E2' and codigo_estado !='E3' and codigo_estado !='E4' Order by codigo_estado;");

          echo "<select id=estado name=estado>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_estado'] . ">" . $row['codigo_estado'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Cada de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";



        echo '<label for="pago" >Metodo de pago</label>';
        // echo "<input type='text' id='pago' name='pago' value=''>";
        
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from metodo_pago Order by codigo_metodo");

          echo "<select id=pago name=pago>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_metodo'] . ">" . $row['codigo_metodo'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="ciudad" >Ciudad</label>';
        // echo "<input type='text' id='ciudad' name='ciudad' value=''>";
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from ciudad Order by codigo_ciudad");

          echo "<select id=ciudad name=ciudad>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_ciudad'] . ">" . $row['codigo_ciudad'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="barrio" >Barrio</label>';
        // echo "<input type='text' id='barrio' name='barrio' value=''>";
        
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from barrio Order by codigo_barrio");

          echo "<select id=barrio name=barrio>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_barrio'] . ">" . $row['codigo_barrio'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="metro" >Metros de la propiedad</label>';
        echo "<input type='int' id='metro' name='metro' value=''>";

        echo '<label for="habitacion" >Habitaciones de la propiedad</label>';
        echo "<input type='int' id='habitacion' name='habitacion' value=''>";

       echo "</div>";
      


      echo "<div class='venta-propiedad__inputs'>
      ";

        echo '<label for="precio" >Precio</label>';
        echo "<input type='int' id='precio' name='precio' value=''>";

        echo '<label for="modelo" >Modelo de la propiedad</label>';
        // echo "<input type='text' id='modelo' name='modelo' value=''>";
        
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from modelo Order by codigo_modelo");

          echo "<select id=modelo name=modelo>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_modelo'] . ">" . $row['codigo_modelo'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="tipo" >Tipo de la propiedad</label>';
        // echo "<input type='text' id='tipo' name='tipo' value=''>";
        
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from tipo_propiedad Order by codigo_tipo");

          echo "<select id=tipo name=tipo>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_tipo'] . ">" . $row['codigo_tipo'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="edad" >Edad de la propiedad</label>';
        echo "<input type='int' id='edad' name='edad' value=''>";

        echo '<label for="destinacion" >Destinación de la propiedad</label>';
        // echo "<input type='text' id='destinacion' name='destinacion' value=''>";
        try {
          // Ejecutando sql
        
          $matriz = $conexion->query("select * from destinacion Order by codigo_destinacion");

          echo "<select id=destinacion name=destinacion>";
          while ($row = $matriz->fetch()) {
            echo "<option value=" . $row['codigo_destinacion'] . ">" . $row['codigo_destinacion'] . " - " . $row['descripcion'] . "</option>";
          }
        } catch (PDOException $e) {
          //Casa de que ocurra algun error
          echo "Fallo el select " . $e->getMessage();
        }

        echo "</select>";

        echo '<label for="bano" >Baños de la propiedad</label>';
        echo "<input type='int' id='bano' name='bano' value=''>";

        echo '<label for="garaje" >Garajes de la propiedad</label>';
        echo "<input type='int' id='garaje' name='garaje' value=''>";

        ?>
        <div class="venta-propiedad__boton">
          <input type="submit" value="Ingresar mi propiedad">
        </div>
      </div>
    </form>

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