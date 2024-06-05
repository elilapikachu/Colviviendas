<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title>Insertar Propiedad</title>
</head>

<body>

  <h1>Insertar nueva Propiedad</h1>
  <div class="container__boton">
    <a href="../read/pagina_de_propiedad.php">Devolver a Propiedad</a>
  </div>
  <form action="insertar_propiedad.php" method="POST" enctype="multipart/form-data">
    <?php
    include_once "../modulo/conexion.php";

    echo '<label for="codigo" >Codigo de la propiedad</label>';
    echo "<input type='text' id='codigo' name='codigo' value=''>";

    echo '<label for="direccion">Direccion de la propiedad</label>';
    echo "<input type='text' id='direccion' name='direccion' value=''>";

    echo '<label for="foto" >Foto de la propiedad</label>';
    echo "<input type='file' id='foto' name='foto' value=''>";

    echo '<label for="estado" >Estado de la propiedad</label>';
    // echo "<input type='text' id='estado' name='estado' value=''>";
    
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from estado Order by codigo_estado");

      echo "<select id=estado name=estado>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_estado'] . ">" . $row['codigo_estado'] . " - " . $row['descripcion'] . "</option>";
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
    
      $matriz = $conexion->query("select identificacion, nombre, apellido from persona Order by identificacion");

      echo "<select id=propietario name=propietario>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['identificacion'] . ">" . $row['identificacion'] . " - " . $row['nombre'] . " " . $row['apellido'] . "</option>";
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
    
      $matriz = $conexion->query("select * from metodo_pago Order by codigo_metodo");

      echo "<select id=pago name=pago>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_metodo'] . ">" . $row['codigo_metodo'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="ciudad" >Ciudad</label>';
    // echo "<input type='text' id='ciudad' name='ciudad' value=''>";
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from ciudad Order by codigo_ciudad");

      echo "<select id=ciudad name=ciudad>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_ciudad'] . ">" . $row['codigo_ciudad'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="barrio" >Barrio</label>';
    // echo "<input type='text' id='barrio' name='barrio' value=''>";
    
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from barrio Order by codigo_barrio");

      echo "<select id=barrio name=barrio>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_barrio'] . ">" . $row['codigo_barrio'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="precio" >Precio</label>';
    echo "<input type='int' id='precio' name='precio' value=''>";

    echo '<label for="modelo" >Modelo de la propiedad</label>';
    // echo "<input type='text' id='modelo' name='modelo' value=''>";
    
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from modelo Order by codigo_modelo");

      echo "<select id=modelo name=modelo>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_modelo'] . ">" . $row['codigo_modelo'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="tipo" >Tipo de la propiedad</label>';
    // echo "<input type='text' id='tipo' name='tipo' value=''>";
    
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from tipo_propiedad Order by codigo_tipo");

      echo "<select id=tipo name=tipo>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_tipo'] . ">" . $row['codigo_tipo'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="edad" >Edad de la propiedad</label>';
    echo "<input type='int' id='edad' name='edad' value=''>";

    echo '<label for="destinacion" >Destinación de la propiedad</label>';
    // echo "<input type='text' id='destinacion' name='destinacion' value=''>";
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from destinacion Order by codigo_destinacion");

      echo "<select id=destinacion name=destinacion>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_destinacion'] . ">" . $row['codigo_destinacion'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="fecha" >fecha de registro de la propiedad</label>';
    echo "<input type='datetime-local' id='fecha' name='fecha' value=''>";


    ?>

    <input type="submit" value="Insertar propiedad">
  </form>

</body>

</html>