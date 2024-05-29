<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Editar Persona</title>
</head>

<body>

    <h1>Editar Persona</h1>
    <div class="container__boton">
        <a href="../read/Persona.php">Devolver a Persona</a>
    </div>
    <form action="persona_edit-sql.php" method="POST" enctype="multipart/form-data">
        <?php 
      include_once "../modulo/conexion.php";

      $vcodigo = filter_var($_GET['codigo']);

      $mysql_host = 'localhost';
      $mysql_user = 'root';
      $password = '';

      $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

      $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

      $matriz = mysqli_query($dbhandle, "select a.identificacion, a.nombre, a.apellido, a.direccion, a.telefono, b.descripcion, a.fecha_registro, c.descripcion as tipo_persona, a.contrasena, a.correo, a.foto from persona a, ciudad b, tipo_persona c where a.ciudad = b.codigo_ciudad AND c.codigo_tipo = a.tipo_persona AND a.identificacion =".$vcodigo.";");

      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  
        echo '<label for="identificacion" >Numero de identificación</label>';
        echo "<input type='text' id='identificacion' name='identificacion' value='".$vcodigo."' readonly>";

        echo '<label for="Nombre">Nombre</label>';
        echo "<input type='text' id='nombre' name='nombre' value='".$row['nombre']."'>";

        echo '<label for="Apellido" >Apellido</label>';
        echo "<input type='text' id='apellido' name='apellido' value='".$row['apellido']."'>";

        echo '<label for="Direccion" >Dirección</label>';
        echo "<input type='text' id='direccion' name='direccion' value='".$row['direccion']."'>";

        echo '<label for="telefono" >Telefono</label>';
        echo "<input type='text' id='telefono' name='telefono' value='".$row['telefono']."'>";

        echo '<label for="ciudad" >Ciudad</label>';
        // echo "<input type='text' id='ciudad' name='ciudad' value=''>";

        try {
          // Ejecutando sql
         
          $matriz1 = $conexion->query("select * from ciudad Order by codigo_ciudad");
          
          echo "<select id=ciudad name=ciudad>";        
          while ($row1 = $matriz1->fetch()) {
          echo "<option value=".$row1['codigo_ciudad'].">".$row1['codigo_ciudad']." - ".$row1['descripcion']."</option>";
          }
        }       
        catch (PDOException $e) {
        //Casa de que ocurra algun error
        echo "Fallo el select ".$e->getMessage();
        }

        echo "</select>";


        echo '<label for="fecha" >fecha de registro</label>';
        echo "<input type='datetime-local' id='fecha' name='fecha'  value='".$row['fecha_registro']."'>";

        echo '<label for="tipo" >Tipo de persona</label>';
        // echo "<input type='text' id='tipo' name='tipo' value=''>";
        try {
          // Ejecutando sql
         
          $matriz1 = $conexion->query("select * from tipo_persona Order by codigo_tipo");
          
          echo "<select id=tipo name=tipo>";        
          while ($row1 = $matriz1->fetch()) {
          echo "<option value=".$row1['codigo_tipo'].">".$row1['codigo_tipo']." - ".$row1['descripcion']."</option>";
          }
        }       
        catch (PDOException $e) {
        //Casa de que ocurra algun error
        echo "Fallo el select ".$e->getMessage();
        }

        echo "</select>";

        echo '<label for="contraseña" >Contraseña</label>';
        echo "<input type='password' id='contrasena' name='contrasena' value='".$row['contrasena']."'>";

        echo '<label for="Email" >Correo electronico</label>';
        echo "<input type='Email' id='email' name='email' value='".$row['correo']."'>";

        echo '<label for="foto" >Foto</label>';
        echo "<input type='file' id='foto' name='foto' value=''>";
        }

    
        ?>

        <input type="submit" value="Modificar">
    </form>
</body>

</html>