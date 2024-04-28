<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo persona</title>
    <link rel="stylesheet" href="./Colviviendas/css/reads.css">
</head>
<body>
<div class="letrero"><h1>Bienvenido a Tipo de persona.</h1>
    <h2>Colvivienda</h2>
</div>
    <?php 
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select * from tipo_persona;");

    //primera fila
    echo "<table>";
    echo "
      <tr>
        <th>Codigo</th>
        <th>Tipo persona</th>
     </tr>";
    
      //Segunda Fila en adelante
        
      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

            echo "<tr>";
            echo "<td>".$row['codigo_tipo']."</td>";
            echo "<td>".$row['descripcion']."</td>";
           
         }  
    
    
    echo "</table>";
    
    
    ?>
</body>
</html>