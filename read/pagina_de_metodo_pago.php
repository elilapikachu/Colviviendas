<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>metodo_pago</title>
  <link rel="stylesheet" href="../css/reads.css">

</head>

<body>
  <script>
    function preguntar(codigo) {

      eliminar = confirm("¿Deseas eliminar este registro?");

      if (eliminar)
        window.location.href = "../delete/eliminar_metodo_pago.php?codigo=" + codigo;
    }
  </script>
  <div class="letrero">
    <h1>Bienvenido a Metodos de Pago.</h1>
    <h2>Colvivienda</h2>
  </div>
  <div class="container">
    <form name="buscar" id="buscar" action="" class="container__form">
      <label class="container__label" for="buscar">Buscar</label>
      <div class="container__input">
        <input class="container__input-text" type="text" name="buscar" id="buscar">
      </div>
      <a href="#" onclick="document.getElementById('buscar').submit();">
        <img class="container__img" src="../imgs/lupa.png" alt="lupa">
      </a>
    </form>

    <div class="container__boton">
      <div class="container__boton-volver">
        <a href="botones.php" class="container__boton-volver-text">Volver</a>
      </div>
      <div class="container__boton-insertar">
        <a href="../Insert/insertar_metodo_pago-forma.php" class="container__boton-insertar-text">Insertar</a>
      </div>
    </div>
  </div>
  <?php
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $password = '';

  $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

  $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");
  
  if (empty($_GET['buscar'])) {
    //si es vacia la opcion trae todo.
    $matriz = mysqli_query($dbhandle, "select * from metodo_pago;");
  } else {
    $matriz = mysqli_query($dbhandle, "select * from metodo_pago where descripcion like '%" . $_GET['buscar'] . "%';");
    $vregistros = mysqli_num_rows($matriz);
    if ($vregistros == 0) {
      echo "no se encontraron registros";
    }
  }


  //primera fila
  echo "<table>";
  echo "
      <tr>
        <th>Codigo</th>
        <th>Metodo de Pago</th>
     </tr>";

  //Segunda Fila en adelante
  
  while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $row['codigo_metodo'] . "</td>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td><a href='../update/metodo-pago_edit.php?codigo=" . $row['codigo_metodo'] . "'>Editar</a></td>";
    echo "<td><a href='javascript:preguntar(\"" . $row['codigo_metodo'] . "\")'>Eliminar</a></td>";

  }


  echo "</table>";


  ?>
</body>

</html>