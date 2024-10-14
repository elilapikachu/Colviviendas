<?php

error_reporting(0);
//Setting session start
session_start();

if (empty($_SESSION['identificacion'])) {
  echo '
    <script>
    alert("Debe iniciar sesion o registrarse para acceder aqui.");
    window.location.href="login.php";
    </script>';
}

$total = 0;
$subtotal = 0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=colviviendas", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//get action string
//isset es lo contrario de isempty 
$action = isset($_GET['action']) ? $_GET['action'] : "";

//Añadir al carrito
if ($action == 'addcart' && $_SERVER['REQUEST_METHOD'] == 'POST') {

  //buscando el producto por el código

  $query = "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion and a.codigo_propiedad=:sku";
  $stmt = $conn->prepare($query);
  $stmt->bindParam('sku', $_POST['sku']);
  $stmt->execute();
  $product = $stmt->fetch();

  $currentQty = $_SESSION['products'][$_POST['sku']]['qty'] + 1; //Incrementing the product qty in cart

  //arreglo con el carrito de compras

  $_SESSION['products'][$_POST['sku']] = array('direccion' => $product['direccion'], 'modelo' => $product['modelo'], 'destinacion' => $product['destinacion'], 'foto' => $product['foto'], 'precio' => $product['precio'], 'codigo_propiedad' => $product['codigo_propiedad']);
  $product = '';
  header("Location:carrito.php");
}

//Empty All
if ($action == 'emptyall') {
  $_SESSION['products'] = array();
  header("Location:carrito.php");
}

//Empty one by one
if ($action == 'empty') {
  $sku = $_GET['sku'];
  $products = $_SESSION['products'];
  unset($products[$sku]);
  $_SESSION['products'] = $products;
  header("Location:carrito.php");
}




//Get all Products
$query = "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion;";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/Modulo_inicio.css">
  <link rel="shortcut icon" href="./img/iconos/carrito-de-compras.png" type="image/x-icon">
  <title>Articulos</title>

</head>

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

        <li class="navbar__element dropdown">
          <a href="#" class="navbar__link">Propiedades</a>
          <ul class="dropdown__menu">

            <?php

            if (!empty($_SESSION['usuario'])) {
              echo '<li><a href="carrito.php" class="dropdown__link">Carrito</a></li>';
            }

            if (!empty($_SESSION['usuario'])) {
              if ($_SESSION['tipo_persona'] == '01' || $_SESSION['tipo_persona'] == '04') {
                echo '
                  <li><a href="./venta-propiedad/venta.php" class="dropdown__link">Venta</a></li>';
              }
            }
            ?>

            <li><a href="venta-usuario.php" class="dropdown__link">Compra</a></li>
            <li><a href="arrendamiento.php" class="dropdown__link">Alquiler</a></li>
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

  <h1 class="tittle__carrito"> Venta de Artículos </h1>


  <div class="container">
    <?php if (!empty($_SESSION['products'])): ?>
      <nav class="navbar-inverse">
        <div class="container-fluid pull-left">
          <div class="navbar-header"> <a class="navbar-brand" href="#">Carrito de Compras</a>
          </div>
        </div>
        <div class="pull-right"><a href="carrito.php?action=emptyall" class="btn btn-info">Vaciar carrito</a></div>
        <div class="pull-right"><a href="carrito-pagar.php" class="btn btn-info">Ir a pagar</a></div>

      </nav>
      <table class="table">
        <thead>
          <tr>
            <th>Propiedad en carrito</th>
            <th>Imagen</th>
            <th>Dirección</th>
            <th>Modelo</th>
            <th>Destinacion</th>
            <th>Precio</th>
            <th></th>
            <!-- <th>Cantidad</th> -->
          </tr>
        </thead>
        <?php foreach ($_SESSION['products'] as $key => $product): ?>
          <? $subtotal = 0; ?>
          <tr>
            <td><?php print $product['codigo_propiedad'] ?></td>
            <td><img src="<?php print $product['foto'] ?>"></td>
            <td><?php print $product['direccion'] ?></td>
            <td><?php print $product['modelo'] ?></td>
            <td><?php print $product['destinacion'] ?></td>
            <?php $subtotal = $subtotal + $product['precio'] * $product['qty']; ?>
            <td>$<?php print number_format($product['precio'], 0, ',', '.') ?></td>
            <?php $subtotal = 0; ?>


            <td><a href="carrito.php?action=empty&sku=<?php print $key ?>" class="btn btn-info">Eliminar</a></td>
          </tr>

          <?php $total = $total + $product['precio']; ?>
        <?php endforeach; ?>
        <tr>
          <td>
            <h4>Total:$<?php print number_format($total, 0, ',', '.') ?></h4>
          </td>
        </tr>
      </table>
    <?php endif; ?>
    <nav class="navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header"> <a class="navbar-brand" href="#">Productos</a> </div>
      </div>

      <!--Trae todos los productos de la tabla -->
    </nav>
    <div class="row">
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Propiedad</th>
              <th>Imagen</th>
              <th>Dirección</th>
              <th>Modelo</th>
              <th>Destinacion</th>
              <th>Precio</th>
              <th></th>
            </tr>
          </thead>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?php print $product['codigo_propiedad'] ?></td>
              <td><img src="<?php print $product['foto'] ?>"></td>
              <td><?php print $product['direccion'] ?></td>
              <td><?php print $product['modelo'] ?></td>
              <td><?php print $product['destinacion'] ?></td>
              <td>$ <?php print number_format($product['precio'], 0, ',', '.') ?></td>
              <td>

                <!-- acción añadir al carrito-->

                <form method="post" action="carrito.php?action=addcart">
                  <button type="submit" class="btn btn-warning">Añadir al carrito</button>
                  <input type="hidden" name="sku" value="<?php print $product['codigo_propiedad'] ?>">
                </form>

              </td>
            </tr>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
  
</body>

</html>