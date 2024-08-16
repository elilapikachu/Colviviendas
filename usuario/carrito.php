<?php

error_reporting(0);
//Setting session start
session_start();

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
  session_unset();
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
  <title>Articulos</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

  <h1> Venta de Artículos </h1>

  <div class="boton">
    <a href="index.php" class="boton__btn">Volver al index</a>
  </div>

  <div class="container" style="width:1000px;">
    <?php if (!empty($_SESSION['products'])): ?>
      <nav class="navbar navbar-inverse" style="background:#04B745;">
        <div class="container-fluid pull-left" style="width:300px;">
          <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Carrito de Compras</a>
          </div>
        </div>
        <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="carrito.php?action=emptyall"
            class="btn btn-info">Vaciar carrito</a></div>
        <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="carrito-pagar.php"
            class="btn btn-info">Ir a pagar</a></div>

      </nav>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Propiedad en carrito</th>
            <th>Imagen</th>
            <th>Dirección</th>
            <th>Modelo</th>
            <th>Destinacion</th>
            <th>Precio</th>
            <!-- <th>Cantidad</th> -->
          </tr>
        </thead>
        <?php foreach ($_SESSION['products'] as $key => $product): ?>
          <? $subtotal = 0; ?>
          <tr>
            <td><?php print $product['codigo_propiedad'] ?></td>
            <td><img src="<?php print $product['foto'] ?>" width="200"></td>
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
          <td colspan="5" align="right">
            <h4>Total:$<?php print number_format($total, 0, ',', '.') ?></h4>
          </td>
        </tr>
      </table>
    <?php endif; ?>
    <nav class="navbar navbar-inverse" style="background:#04B745;">
      <div class="container-fluid">
        <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Productos</a> </div>
      </div>

      <!--Trae todos los productos de la tabla -->
    </nav>
    <div class="row">
      <div class="container" style="width:1000px;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Propiedad</th>
              <th>Imagen</th>
              <th>Dirección</th>
              <th>Modelo</th>
              <th>Destinacion</th>
              <th>Precio</th>
            </tr>
          </thead>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?php print $product['codigo_propiedad'] ?></td>
              <td><img src="<?php print $product['foto'] ?>" width="200"></td>
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