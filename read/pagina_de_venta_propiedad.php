<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Colviviendas/css/reads.css">
    <title>Venta propiedad</title>
</head>
<body>
<div class="letrero"><h1>Bienvenido a Venta de propiedad.</h1>
    <h2>Colvivienda</h2>
</div>
    <?php 
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, b.direccion, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b WHERE a.codigo_propiedad = b.codigo_propiedad;");

    //primera fila
    echo "<table>";
    echo "
      <tr>
        <th>Numero de venta</th>
        <th>Codigo propiedad</th>
        <th>Direccion</th>
        <th>Fecha de entrega</th>
        <th>Precio Inicial</th>
        <th>Precio Final</th>
     </tr>";
    
      //Segunda Fila en adelante
        
      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

            echo "<tr>";
            echo "<td>".$row['nro_venta']."</td>";
            echo "<td>".$row['codigo_propiedad']."</td>";
            echo "<td>".$row['direccion']."</td>";
            echo "<td>".$row['fecha_entrega']."</td>";
            echo "<td>".$row['precio']."</td>";
            echo "<td>".$row['precio_final']."</td>";
            echo "</tr>";
         }  
    
    
    echo "</table>";
    
    
    ?>
</body>
</html>