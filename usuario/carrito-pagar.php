<?php
error_reporting(0);
//Setting session start
session_start();


$total = 0;
$subtotal = 0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=colviviendas", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$products = $_SESSION['products'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/Modulo_inicio.css">
  <title>A pagar!</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

  <center>
    <h1> Resumen de Compra </h1>
  </center>
  <br>
  <div class="container" style="width:600px;">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Dirección</th>
          <th>Modelo</th>
          <th>Destinacion</th>
          <th>Precio</th>
          <th>Accion</th>
        </tr>
      </thead>
      <?php foreach ($_SESSION['products'] as $key => $product): ?>
        <tr>
          <td><img src="<?php print $product['foto'] ?>" width="200"></td>
          <td><?php print $product['direccion'] ?></td>
          <td><?php print $product['modelo'] ?></td>
          <td><?php print $product['destinacion'] ?></td>
          <td>$<?php print number_format($product['precio'], 0, ',', '.') ?></td>
          <td><a href="carrito.php?action=empty&sku=<?php print $key ?>" class="btn btn-info"> Eliminar</a></td>
        </tr>
        <?php $total = $total + $product['precio'] ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="5" align="right">
          <h4>Total a Pagar :$ <?php print number_format($total, 0, ',', '.') ?></h4>
        </td>
      </tr>
    </table>
    <h1>Gracias por usar nuestros servicios, </h1>
    <input type="button" onclick="location.href='carrito.php'" value="Volver al carrito">

  </div>

</body>

</html>