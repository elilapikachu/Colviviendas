<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title>Insertar Destinación</title>
</head>

<body>

  <h1>Insertar nueva destinación</h1>
  <div class="container__boton">
    <a href="../read/pagina_de_destinacion.php">Devolver a destinación</a>
  </div>
  <form action="destinacion_edit-sql.php" method="POST">
    <?php
    $vcodigo = filter_var($_GET['codigo']);
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select * from destinacion where codigo_destinacion = '" . $vcodigo . "' ;");

    while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

      echo '<label for="codigo" >Codigo de la destinacion</label>';
      echo "<input type='text' id='codigo' name='codigo'  value='" . $vcodigo . "' readonly>";

      echo '<label for="descripcion">Nombre de la destinación</label>';
      echo "<input type='text' id='descripcion' name='descripcion'  value='" . $row['descripcion'] . "'>";

    }
    ?>

    <input type="submit" value="Modificar Destinación">
  </form>

</body>

</html>