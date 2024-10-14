<?php
error_reporting(0);
// Iniciar sesión
session_start();

$total = 0;
$subtotal = 0;

// Conexión a la base de datos
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
  <title>Resumen de Compra</title>
</head>

<body>

  <h1 class="compra__titulo">Resumen de Compra</h1>

  <div class="compra__container">
    <table class="compra__tabla">
      <thead class="compra__tabla-encabezado">
        <tr class="compra__fila">
          <th class="compra__tabla-columna">Imagen</th>
          <th class="compra__tabla-columna">Dirección</th>
          <th class="compra__tabla-columna">Modelo</th>
          <th class="compra__tabla-columna">Destinación</th>
          <th class="compra__tabla-columna">Precio</th>
          <th class="compra__tabla-columna">Acción</th>
        </tr>
      </thead>
      <tbody class="compra__tabla-cuerpo">
        <?php foreach ($products as $key => $product): ?>
          <tr class="compra__fila">
            <td class="compra__tabla-columna"><img src="<?php print $product['foto'] ?>" alt="Imagen propiedad" class="compra__imagen"></td>
            <td class="compra__tabla-columna"><?php print $product['direccion'] ?></td>
            <td class="compra__tabla-columna"><?php print $product['modelo'] ?></td>
            <td class="compra__tabla-columna"><?php print $product['destinacion'] ?></td>
            <td class="compra__tabla-columna">$<?php print number_format($product['precio'], 0, ',', '.') ?></td>
            <td class="compra__tabla-columna">
              <a href="carrito.php?action=empty&sku=<?php print $key ?>" class="compra__btn compra__btn--eliminar">Eliminar</a>
            </td>
          </tr>
          <?php $total = $total + $product['precio']; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot class="compra__tabla-pie">
        <tr class="compra__fila">
          <td colspan="6" class="compra__tabla-total">
            <h4 class="compra__total-texto">Total a Pagar: $<?php print number_format($total, 0, ',', '.') ?></h4>
          </td>
        </tr>
      </tfoot>
    </table>
    <h1 class="compra__agradecimiento">Gracias por usar nuestros servicios</h1>
    <input type="button" class="compra__btn compra__btn--volver" onclick="location.href='carrito.php'" value="Volver al carrito">
  </div>

</body>

</html>
