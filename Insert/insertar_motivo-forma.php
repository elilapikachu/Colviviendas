<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title>Insertar Motivo</title>
</head>

<body>

  <h1>Insertar nuevo motivo</h1>
  <div class="container__boton">
    <a href="../read/pagina_de_motivo.php">Devolver a Motivo</a>
  </div>
  <form action="insertar_motivo.php" method="POST">
    <?php
    echo '<label for="codigo" >Codigo del motivo</label>';
    echo "<input type='text' id='codigo' name='codigo' value=''>";

    echo '<label for="descripcion">Descripción del motivo</label>';
    echo "<input type='text' id='descripcion' name='descripcion' value=''>";


    ?>

    <input type="submit" value="Insertar Motivo">
  </form>

</body>

</html>