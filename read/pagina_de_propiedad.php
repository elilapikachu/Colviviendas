<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/reads.css">
  <title>Propiedad</title>
</head>
<style>
  @keyframes texto {
    from {
      margin-left: 100%;
      width: 300%;
    }

    to {
      margin-left: 0%;
      width: 100%;
    }
  }

  h1 {
    animation-duration: 3s;
    animation-name: texto;
    animation-iteration-count: initial;
    animation-direction: alternate;
  }

  h2 {
    animation-duration: 3s;
    animation-name: texto;
    animation-iteration-count: initial;
    animation-direction: alternate;
  }
</style>

<body>
  <script>
    function preguntar(codigo) {

      eliminar = confirm("¿Deseas eliminar este registro?");

      if (eliminar)
        window.location.href = "../delete/eliminar_propiedad.php?codigo=" + codigo;
    }
  </script>
  <div class="letrero">
    <h1>Bienvenido a Propiedad.</h1>
    <h2>Colvivienda</h2>
  </div>
  <div class="container">
    <form name="buscar" id="buscar" class="container__form">
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
        <a href="../Insert/insertar_propiedad-forma.php" class="container__boton-insertar-text">Insertar</a>
      </div>
    </div>
  </div>
  <?php

  include_once "../modulo/conexion.php";
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $password = '';

  $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

  $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

  if (empty($_GET['buscar'])) {
    //si es vacia la opcion trae todo.
    $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, a.nro_habitaciones, a.nro_banos, a.nro_metros, a.nro_garajes, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion;");

  } else {

    $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad,a.nro_metros,a.nro_banos,a.nro_garajes, a.nro_habitaciones, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion and a.direccion like '%" . $_GET['buscar'] . "%';");
    $vregistros = mysqli_num_rows($matriz);
    if ($vregistros == 0) {
      echo "no se encontraron registros";
    }
  }


  //primera fila
  echo "<table>";
  echo "
      <tr>
        <th>Codigo de la propiedad</th>
        <th>Dirección</th>
        <th>Foto</th>
        <th>Estado</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Metodo de pago</th>
        <th>Ciudad</th>
        <th>Barrio</th>
        <th>Precio</th>
        <th>Modelo</th>
        <th>Fecha de registro</th>
        <th>Tipo</th>
        <th>Edad</th>
        <th>Destinación</th>
        <th>Metros</th>
        <th>Baños</th>
         <th>Habitaciones</th>
        <th>Garajes</th>
     </tr>";

  //Segunda Fila en adelante
  
  while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $row['codigo_propiedad'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
    echo "<td>";
    echo "<img src='" . $row['foto'] . "' width='100' >";
    echo "</td>";
    echo "<td>" . $row['estado'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td>" . $row['ciudad'] . "</td>";
    echo "<td>" . $row['barrio'] . "</td>";
    echo "<td>" . $row['precio'] . "</td>";
    echo "<td>" . $row['modelo'] . "</td>";
    echo "<td>" . $row['fecha_registro'] . "</td>";
    echo "<td>" . $row['tipo_propiedad'] . "</td>";
    echo "<td>" . $row['edad'] . "</td>";
    echo "<td>" . $row['destinacion'] . "</td>";
    echo "<td>" . $row['nro_metros'] . " m2</td>";
    echo "<td>" . $row['nro_banos'] . "</td>";
    echo "<td>" . $row['nro_habitaciones'] . "</td>";
    echo "<td>" . $row['nro_garajes'] . "</td>";
    echo "</tr>";
    echo "<td><a href='../update/propiedad_edit.php?codigo=" . $row['codigo_propiedad'] . "'>Editar</a></td>";
    echo "<td><a href='javascript:preguntar(\"" . $row['codigo_propiedad'] . "\")'>Eliminar</a></td>";

  }


  echo "</table>";

  ?>
  
</body>

</html>