<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reads.css">
  <title>Venta propiedad</title>
</head>

<body>
  <script>
    function preguntar(codigo) {

      eliminar = confirm("¿Deseas eliminar este registro?");

      if (eliminar)
        window.location.href = "../delete/eliminar_venta_propiedad.php?codigo=" + codigo;
    }
  </script>
  <div class="letrero">
    <h1>Bienvenido a Venta de propiedad.</h1>
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
        <a href="../Insert/insertar_venta_propiedad-forma.php" class="container__boton-insertar-text">Insertar</a>
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
    $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, persona.nombre, persona.apellido, b.direccion, b.foto, c.fecha_compra, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b, venta c, persona persona WHERE a.codigo_propiedad = b.codigo_propiedad and a.nro_venta = c.nro_venta and persona.identificacion = c.comprador;");
  } else {
    $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, persona.nombre, persona.apellido, b.direccion, b.foto, c.fecha_compra, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b, venta c, persona persona WHERE a.codigo_propiedad = b.codigo_propiedad and a.nro_venta = c.nro_venta and persona.identificacion = c.comprador and b.direccion like '%" . $_GET['buscar'] . "%';");
    $vregistros = mysqli_num_rows($matriz);
    if ($vregistros == 0) {
      $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, persona.nombre, persona.apellido, b.direccion, b.foto, c.fecha_compra, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b, venta c, persona persona WHERE a.codigo_propiedad = b.codigo_propiedad and a.nro_venta = c.nro_venta and persona.identificacion = c.comprador and persona.nombre like '%" . $_GET['buscar'] . "%';");
      // echo "no se encontraron registros";
      $vregistros = mysqli_num_rows($matriz);
    }
    if ($vregistros == 0) {
      $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, persona.nombre, persona.apellido, b.direccion, b.foto, c.fecha_compra, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b, venta c, persona persona WHERE a.codigo_propiedad = b.codigo_propiedad and a.nro_venta = c.nro_venta and persona.identificacion = c.comprador and persona.apellido like '%" . $_GET['buscar'] . "%';");
      // echo "no se encontraron registros";
      $vregistros = mysqli_num_rows($matriz);
    }
    if ($vregistros == 0) {
      echo "no se encontraron registros";
    }
  }


  //primera fila
  echo "<table>";
  echo "
      <tr>
        <th>Numero de venta</th>
        <th>Codigo propiedad</th>
        <th>Nombre del comprador</th>
        <th>Apellido del comprador</th>
        <th>Direccion</th>
        <th>Foto</th>
        <th>Fecha de compra</th>
        <th>Fecha de entrega</th>
        <th>Precio Inicial</th>
        <th>Precio Final</th>
     </tr>";

  //Segunda Fila en adelante
  
  while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $row['nro_venta'] . "</td>";
    echo "<td>" . $row['codigo_propiedad'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
    echo "<td>";
    echo "<img src='" . $row['foto'] . "' width='100' >";
    echo "</td>";
    echo "<td>" . $row['fecha_compra'] . "</td>";
    echo "<td>" . $row['fecha_entrega'] . "</td>";
    echo "<td>" . $row['precio'] . "</td>";
    echo "<td>" . $row['precio_final'] . "</td>";

    echo "</tr>";
    echo "<td><a href='../update/venta-propiedad.php?codigo=" . $row['nro_venta'] . "'>Editar</a></td>";
    echo "<td><a href='javascript:preguntar(\"" . $row['nro_venta'] . "\")'>Eliminar</a></td>";
  }


  echo "</table>";


  ?>
</body>

</html>