<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Venta Propiedad</title>
</head>
<body>

    <h1>Insertar nueva venta Propiedad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_venta_propiedad.php">Devolver a Venta de Propiedad</a>
    </div>
    <form action="insertar_venta_propiedad.php" method="POST">
      <?php 
        include_once "../modulo/conexion.php";

        echo '<label for="venta" >Numero de venta</label>';
        // echo "<input type='text' id='venta' name='venta' value=''>";

        try {
          // Ejecutando sql
         
          $matriz = $conexion->query("SELECT a.nro_venta, b.nombre, b.apellido FROM venta a, persona b WHERE a.comprador = b.identificacion Order by nro_venta;");
          
          echo "<select id=venta name=venta>";        
          while ($row = $matriz->fetch()) {
          echo "<option value=".$row['nro_venta'].">".$row['nro_venta']." - ".$row['nombre']." ".$row['apellido']."</option>";
          }
        }       
        catch (PDOException $e) {
        //Casa de que ocurra algun error
        echo "Fallo el select ".$e->getMessage();
        }

        echo "</select>";

        echo '<label for="propiedad">Codigo de la Propiedad</label>';
        // echo "<input type='text' id='propiedad' name='propiedad' value=''>";
        try {
          // Ejecutando sql
         
          $matriz = $conexion->query("select codigo_propiedad, direccion  from propiedad Order by codigo_propiedad;");
          
          echo "<select id=propiedad name=propiedad>";        
          while ($row = $matriz->fetch()) {
          echo "<option value=".$row['codigo_propiedad'].">".$row['codigo_propiedad']." - ".$row['direccion']."</option>";
          }
        }       
        catch (PDOException $e) {
        //Casa de que ocurra algun error
        echo "Fallo el select ".$e->getMessage();
        }

        echo "</select>";

        echo '<label for="fecha">Fecha de entrega</label>';
        echo "<input type='datetime-local' id='fecha' name='fecha' value=''>";

        echo '<label for="precio">Precio final de la venta</label>';
        echo "<input type='int' id='precio' name='precio' value=''>";
        ?>

      <input type="submit" value="Insertar venta de propiedad">
    </form>
    
</body>
</html>