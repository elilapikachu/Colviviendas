<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reads.css">
  <title>Colviviendas</title>
</head>

<body>
  <script>
    function preguntar(codigo) {

      eliminar = confirm("¿Deseas eliminar este registro?");

      if (eliminar)
        window.location.href = "../delete/eliminar_persona.php?codigo=" + codigo;
    }
  </script>
  <div class="letrero">
    <h1>Bienvenido a Persona.</h1>
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
        <a href="../Insert/insertar_forma.php" class="container__boton-insertar-text">Insertar</a>
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
    $matriz = mysqli_query($dbhandle, "select a.identificacion, a.nombre, a.apellido, a.direccion, a.telefono, b.descripcion, a.fecha_registro, c.descripcion as tipo_persona, a.contrasena, a.correo, a.foto from persona a, ciudad b, tipo_persona c where a.ciudad = b.codigo_ciudad AND c.codigo_tipo = a.tipo_persona;");

  } else {

    $matriz = mysqli_query($dbhandle, "select a.identificacion, a.nombre, a.apellido, a.direccion, a.telefono, b.descripcion, a.fecha_registro, c.descripcion as tipo_persona, a.contrasena, a.correo, a.foto from persona a, ciudad b, tipo_persona c where a.ciudad = b.codigo_ciudad AND c.codigo_tipo = a.tipo_persona and a.nombre like '%" . $_GET['buscar'] . "%';");
    $vregistros = mysqli_num_rows($matriz);
    if ($vregistros == 0) {
      $matriz = mysqli_query($dbhandle, "select a.identificacion, a.nombre, a.apellido, a.direccion, a.telefono, b.descripcion, a.fecha_registro, c.descripcion as tipo_persona, a.contrasena, a.correo, a.foto from persona a, ciudad b, tipo_persona c where a.ciudad = b.codigo_ciudad AND c.codigo_tipo = a.tipo_persona and a.apellido like '%" . $_GET['buscar'] . "%';");
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
        <th>Identificación</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Ciudad</th>
        <th>Fecha de Registro</th>
        <th>Tipo de persona</th>
        <th>Contraseña</th>
        <th>Correo</th>
        <th>Foto</th>
     </tr>";

  //Segunda Fila en adelante
  
  while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $row['identificacion'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
    echo "<td>" . $row['telefono'] . "</td>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td>" . $row['fecha_registro'] . "</td>";
    echo "<td>" . $row['tipo_persona'] . "</td>";
    echo "<td>" . $row['contrasena'] . "</td>";
    echo "<td>" . $row['correo'] . "</td>";
    echo "<td>";
    echo "<img src='" . $row['foto'] . "' width='100' >";
    echo "</td>";
    echo "</tr>";
    echo "<td><a href='../update/persona_edit.php?codigo=" . $row['identificacion'] . "'>Editar</a></td>";
    echo "<td><a href='javascript:preguntar(\"" . $row['identificacion'] . "\")'>Eliminar</a></td>";

  }


  echo "</table>";





  ?>
</body>

</html>