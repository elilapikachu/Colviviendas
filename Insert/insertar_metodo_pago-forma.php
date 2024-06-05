<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title>Insertar Metodo</title>
</head>

<body>

  <h1>Insertar nuevo metodo de pago</h1>
  <div class="container__boton">
    <a href="../read/pagina_de_metodo_pago.php">Devolver a metodo de pago</a>
  </div>
  <form action="insertar_metodo_pago.php" method="POST">
    <?php
    echo '<label for="codigo" >Codigo del Metodo de Pago</label>';
    echo "<input type='text' id='codigo' name='codigo' value=''>";

    echo '<label for="descripcion">Descripción del metodo de pago</label>';
    echo "<input type='text' id='descripcion' name='descripcion' value=''>";


    ?>

    <input type="submit" value="Insertar Metodo de Pago">
  </form>

</body>

</html>