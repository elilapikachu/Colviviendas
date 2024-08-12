<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../imgs/logo/Logo_colviviendas.jpeg" type="image/x-icon">
  <link rel="stylesheet" href="../css/index_admin.css">
  <title>Index</title>
</head>

<body>
  <?php

  session_start();

  if (empty($_SESSION['identificacion'])) {
    echo '
      <script>
      alert("Debe iniciar sesion o registrarse para acceder aqui.");
      window.location.href="../usuario/login.php";
      </script>';
  }

  echo '
  <div class="letrero">
    <div class="letrero__contenido">
      <h1 class="letrero__tittle">Bienvenido al Index ' . $_SESSION['usuario'] . '</h1>
      <h2 class="letrero__subtittle">Colviviendas</h2>
    </div>'; ?>
  </div>
  <div class="letrero__cerrar">
    <button class="letrero_cerrar-button" onclick="location.href='../usuario/cerrar.php'">Cerrar sesión</button>
  </div>
  </div>

  <div class="button-box">
    <div class="button-box2">
      <div class="button-container">
        <a href="Persona.php"><button>Persona</button></a>
        <a href="pagina_de_metodo_pago.php"><button>Metodo de pago</button></a>
        <a href="pagina_de_estado.php"><button>Estado</button></a>
      </div>
      <div class="button-container">
        <a href="pagina_de_destinacion.php"><button>Destinacion</button></a>
        <a href="pagina_de_motivo.php"><button>Motivo</button></a>
        <a href="pagina_de_tipo_persona.php"><button>Tipo de persona</button></a>
      </div>
      <div class="button-container">
        <a href="pagina_de_venta_propiedad.php"><button>Venta de propiedad</button></a>
        <a href="pagina_de_propiedad.php"><button>Propiedad</button></a>
        <a href="pagina_de_ciudad.php"><button>Ciudad</button></a>
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
          <img src="../imgs/Redes/llamada-telefonica.png" alt="telefono" class="footer__redes-img">
        </div>
      </div>
      <div class="footer__redes-container">
        <div class="footer__redes-textos">
          <h3 class="footer__redes-tittle">Email</h3>
          <p class="footer__redes-parrafo">colviviendasJuntosparaEncontrartuhogar@gmail.com</p>
          <img src="../imgs/Redes/sobre.png" alt="email" class="footer__redes-img">
        </div>
      </div>
      <div class="footer__redes-container">
        <div class="footer__redes-textos">
          <h3 class="footer__redes-tittle">Twiter</h3>
          <p class="footer__redes-parrafo">Colviviendas oficial</p>
          <img src="../imgs/Redes/gorjeo.png" alt="twiter" class="footer__redes-img">
        </div>
      </div>
      <div class="footer__redes-container">
        <div class="footer__redes-textos">
          <h3 class="footer__redes-tittle">Facebook</h3>
          <p class="footer__redes-parrafo">Colviviendas Español</p>
          <img src="../imgs/Redes/facebook.png" alt="facebook" class="footer__redes-img">
        </div>
      </div>
      <div class="footer__redes-container">
        <div class="footer__redes-textos">
          <h3 class="footer__redes-tittle">Instagram</h3>
          <p class="footer__redes-parrafo">Colviviendas</p>
          <img src="../imgs/Redes/instagram.png" alt="instragram" class="footer__redes-img">
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