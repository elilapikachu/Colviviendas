<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title> Editar Propiedad</title>
</head>

<body>

  <h1>Editar Propiedad</h1>
  <div class="container__boton">
    <a href="../read/pagina_de_propiedad.php">Devolver a Propiedad</a>
  </div>
  <form action="propiedad_edit-sql.php" method="POST" enctype="multipart/form-data">
    <?php
    include_once "../modulo/conexion.php";

    $vcodigo = filter_var($_GET['codigo']);
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.codigo_estado, a.nro_habitaciones, a.nro_banos, a.nro_garajes, a.nro_metros ,b.descripcion as estado, c.identificacion, d.codigo_metodo ,d.descripcion, e.codigo_ciudad, e.descripcion as ciudad, f.codigo_barrio ,f.descripcion as barrio, a.precio, g.codigo_modelo, g.descripcion as modelo, a.fecha_registro, h.codigo_tipo , h.descripcion as tipo_propiedad, a.edad, i.codigo_destinacion, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion and a.codigo_propiedad = '" . $vcodigo . "';");

    while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {

      echo '<label for="codigo" >Codigo de la propiedad</label>';
      echo "<input type='text' id='codigo' name='codigo' value='" . $vcodigo . "' readonly>";

      echo '<label for="direccion">Direccion de la propiedad</label>';
      echo "<input type='text' id='direccion' name='direccion'  value='" . $row['direccion'] . "'>";

      echo '<label for="foto" >Foto de la propiedad</label>';
      echo "<input type='file' id='foto' name='foto' value='' value='" . $row['foto'] . "'>";

      echo '<label for="estado" >Estado de la propiedad</label>';
      // echo "<input type='text' id='estado' name='estado' value=''>";
    
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from estado Order by codigo_estado");

        echo "<select id=estado name=estado>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_estado'] == $row['codigo_estado']) {

            echo "<option value=" . $row1['codigo_estado'] . " selected>" . $row1['codigo_estado'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_estado'] . ">" . $row1['codigo_estado'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";
      echo '<label for="propietario" >Identificacion del propietario</label>';
      // echo "<input type='text' id='propietario' name='propietario' value=''>";
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select identificacion, nombre, apellido from persona Order by identificacion");

        echo "<select id=propietario name=propietario>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['identificacion'] == $row['identificacion']) {

            echo "<option value=" . $row1['identificacion'] . " selected>" . $row1['identificacion'] . " - " . $row1['nombre'] . " " . $row1['apellido'] . "</option>";
          } else {

            echo "<option value=" . $row1['identificacion'] . ">" . $row1['identificacion'] . " - " . $row1['nombre'] . " " . $row1['apellido'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";


      echo '<label for="pago" >Metodo de pago</label>';
      // echo "<input type='text' id='pago' name='pago' value=''>";
    
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from metodo_pago Order by codigo_metodo");

        echo "<select id=pago name=pago>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_metodo'] == $row['codigo_metodo']) {

            echo "<option value=" . $row1['codigo_metodo'] . " selected>" . $row1['codigo_metodo'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_metodo'] . ">" . $row1['codigo_metodo'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="ciudad" >Ciudad</label>';
      // echo "<input type='text' id='ciudad' name='ciudad' value=''>";
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select codigo_ciudad, descripcion from ciudad Order by codigo_ciudad");

        echo "<select id=ciudad name=ciudad>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_ciudad'] == $row['codigo_ciudad']) {

            echo "<option value=" . $row1['codigo_ciudad'] . " selected>" . $row1['codigo_ciudad'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_ciudad'] . ">" . $row1['codigo_ciudad'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="barrio" >Barrio</label>';
      // echo "<input type='text' id='barrio' name='barrio' value=''>";
    
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from barrio Order by codigo_barrio");

        echo "<select id=barrio name=barrio>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_barrio'] == $row['codigo_barrio']) {

            echo "<option value=" . $row1['codigo_barrio'] . " selected>" . $row1['codigo_barrio'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_barrio'] . ">" . $row1['codigo_barrio'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="precio" >Precio</label>';
      echo "<input type='int' id='precio' name='precio'  value='" . $row['precio'] . "'>";

      echo '<label for="modelo" >Modelo de la propiedad</label>';
      // echo "<input type='text' id='modelo' name='modelo' value=''>";
    
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from modelo Order by codigo_modelo");

        echo "<select id=modelo name=modelo>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_modelo'] == $row['codigo_modelo']) {

            echo "<option value=" . $row1['codigo_modelo'] . " selected>" . $row1['codigo_modelo'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_modelo'] . ">" . $row1['codigo_modelo'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="tipo" >Tipo de la propiedad</label>';
      // echo "<input type='text' id='tipo' name='tipo' value=''>";
    
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from tipo_propiedad Order by codigo_tipo");

        echo "<select id=tipo name=tipo>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_tipo'] == $row['codigo_tipo']) {

            echo "<option value=" . $row1['codigo_tipo'] . " selected>" . $row1['codigo_tipo'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_tipo'] . ">" . $row1['codigo_tipo'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="edad" >Edad de la propiedad</label>';
      echo "<input type='int' id='edad' name='edad'  value='" . $row['edad'] . "'>";

      echo '<label for="destinacion" >Destinación de la propiedad</label>';
      // echo "<input type='text' id='destinacion' name='destinacion' value=''>";
      try {
        // Ejecutando sql
    
        $matriz1 = $conexion->query("select * from destinacion Order by codigo_destinacion");

        echo "<select id=destinacion name=destinacion>";
        while ($row1 = $matriz1->fetch()) {

          if ($row1['codigo_destinacion'] == $row['codigo_destinacion']) {

            echo "<option value=" . $row1['codigo_destinacion'] . " selected>" . $row1['codigo_destinacion'] . " - " . $row1['descripcion'] . "</option>";
          } else {

            echo "<option value=" . $row1['codigo_destinacion'] . ">" . $row1['codigo_destinacion'] . " - " . $row1['descripcion'] . "</option>";
          }
        }
      } catch (PDOException $e) {
        //Cada de que ocurra algun error
        echo "Fallo el select " . $e->getMessage();
      }

      echo "</select>";

      echo '<label for="metro" >Metros de la propiedad</label>';
      echo "<input type='int' id='metro' name='metro' value='" . $row['nro_metros'] . "'>";

      echo '<label for="habitacion" >Habitaciones de la propiedad</label>';
      echo "<input type='int' id='habitacion' name='habitacion' value='" . $row['nro_habitaciones'] . "'>";


      echo '<label for="bano" >Baños de la propiedad</label>';
      echo "<input type='int' id='bano' name='bano' value='" . $row['nro_banos'] . "'>";

      echo '<label for="garaje" >Garajes de la propiedad</label>';
      echo "<input type='int' id='garaje' name='garaje' value='" . $row['nro_garajes'] . "'>";

      echo '<label for="fecha" >fecha de registro de la propiedad</label>';
      echo "<input type='text' id='fecha' name='fecha'  value='" . $row['fecha_registro'] . "' readonly>";

    }
    ?>

    <input type="submit" value="Modificar">
  </form>

</body>

</html>