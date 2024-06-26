<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insert.css">
  <title>Insertar Persona</title>
</head>

<body>

  <h1>Insertar nueva Persona</h1>
  <div class="container__boton">
    <a href="../read/Persona.php">Devolver a Persona</a>
  </div>
  <form action="insertar_persona.php" method="POST" enctype="multipart/form-data">
    <?php
    include_once "../modulo/conexion.php";

    echo '<label for="identificacion" >Numero de identificación</label>';
    echo "<input type='text' id='identificacion' name='identificacion' value=''>";

    echo '<label for="Nombre">Nombre</label>';
    echo "<input type='text' id='nombre' name='nombre' value=''>";

    echo '<label for="Apellido" >Apellido</label>';
    echo "<input type='text' id='apellido' name='apellido' value=''>";

    echo '<label for="Direccion" >Dirección</label>';
    echo "<input type='text' id='direccion' name='direccion' value=''>";

    echo '<label for="telefono" >Telefono</label>';
    echo "<input type='text' id='telefono' name='telefono' value=''>";

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



    echo '<label for="fecha" >fecha de registro</label>';
    echo "<input type='datetime-local' id='fecha' name='fecha' value=''>";

    echo '<label for="tipo" >Tipo de persona</label>';
    // echo "<input type='text' id='tipo' name='tipo' value=''>";
    try {
      // Ejecutando sql
    
      $matriz = $conexion->query("select * from tipo_persona Order by codigo_tipo");

      echo "<select id=tipo name=tipo>";
      while ($row = $matriz->fetch()) {
        echo "<option value=" . $row['codigo_tipo'] . ">" . $row['codigo_tipo'] . " - " . $row['descripcion'] . "</option>";
      }
    } catch (PDOException $e) {
      //Casa de que ocurra algun error
      echo "Fallo el select " . $e->getMessage();
    }

    echo "</select>";

    echo '<label for="contraseña" >Contraseña</label>';
    echo "<input type='password' id='contrasena' name='contrasena' value=''>";

    echo '<label for="Email" >Correo electronico</label>';
    echo "<input type='Email' id='email' name='email' value=''>";

    echo '<label for="foto" >Foto</label>';
    echo "<input type='file' id='foto' name='foto' value=''>";




    ?>

    <input type="submit" value="Insertar Persona">
  </form>

</body>

</html>