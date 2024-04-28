<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Colviviendas/css/reads.css">
    <title>Propiedad</title>
</head>
<body>
<body>
    <div class="letrero"><h1>Bienvenido a Propiedad.</h1>
    <h2>Colvivienda</h2>
</div>
    <?php 
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.nombre, c.apellido, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion;");

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
     </tr>";
    
      //Segunda Fila en adelante
        
      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

            echo "<tr>";
            echo "<td>".$row['codigo_propiedad']."</td>";
            echo "<td>".$row['direccion']."</td>";
            echo "<td>"; 
            echo "<img src='".$row['foto']."' width='100' >";
            echo "</td>";
            echo "<td>".$row['estado']."</td>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['apellido']."</td>";
            echo "<td>".$row['descripcion']."</td>";
            echo "<td>".$row['ciudad']."</td>";
            echo "<td>".$row['barrio']."</td>";
            echo "<td>".$row['precio']."</td>";
            echo "<td>".$row['modelo']."</td>";
            echo "<td>".$row['fecha_registro']."</td>";
            echo "<td>".$row['tipo_propiedad']."</td>";
            echo "<td>".$row['edad']."</td>";
            echo "<td>".$row['destinacion']."</td>";
            echo "</tr>";
           
         }  
    
    
    echo "</table>";
    
    ?>
</body>
</html>