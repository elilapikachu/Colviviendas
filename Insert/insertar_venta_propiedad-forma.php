<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Venta Propiedad</title>
</head>
<body>

    <h1>Insertar nueva venta Propiedad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_venta_propiedad.php">Devolver a Venta de Propiedad</a>
    </div>
    <form action="insertar_venta_propiedad.php" method="POST">
      <?php 
        echo '<label for="venta" >Numero de venta</label>';
        echo "<input type='text' id='venta' name='venta' value=''>";

        echo '<label for="propiedad">Codigo de la Propiedad</label>';
        echo "<input type='text' id='propiedad' name='propiedad' value=''>";

        echo '<label for="fecha">Fecha de entrega</label>';
        echo "<input type='datetime-local' id='fecha' name='fecha' value=''>";

        echo '<label for="precio">Precio final de la venta</label>';
        echo "<input type='int' id='precio' name='precio' value=''>";
        ?>

      <input type="submit" value="Insertar venta de propiedad">
    </form>
    
</body>
</html>