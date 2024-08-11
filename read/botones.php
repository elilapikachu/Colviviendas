<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../imgs/logo/Logo_colviviendas.jpeg" type="image/x-icon">
  <link rel="stylesheet" href="../css/pie_and_navbar.css">
  <title>Index</title>
</head>

<body>
  <?php

  session_start();
  echo '
  <div class="letrero">
    <div class="letrero__contenido">
      <h1 class="letrero__tittle">Bienvenido al Index ' . $_SESSION['usuario'] . '</h1>
      <h2 class="letrero__subtittle">Colvivienda</h2>
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
</body>
<footer class="footer">
  <div class="contenedor__fooder">
    <div class="contenedor__info">
      <h4>Telefono</h4>
      <p>1256537253</p>
    </div>
    <div class="contenedor__info">
      <h4>Pinterest</h4>
      <img src="../imgs/pinterest.png" alt="">
    </div>
    <div class="contenedor__info">
      <h4>Email</h4>
      <p>1256537253</p>
    </div>
    <div class="contenedor__info">
      <h4>Facebook</h4>
      <img src="../imgs/facebook.png" alt="red social">
    </div>
    <div class="contenedor__info">
      <h4>Instagram</h4>
      <img src="../imgs/instagram.png" alt="red social">
    </div>
  </div>
</footer>

</html>