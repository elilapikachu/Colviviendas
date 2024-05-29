<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reads.css">
    <title>Destinación</title>
</head>
<body>
<script>
      function preguntar(codigo){

          eliminar=confirm("¿Deseas eliminar este registro?");

      if (eliminar)
        window.location.href="../delete/eliminar_destinacion.php?codigo="+codigo;
      }
      </script> 
<div class="letrero"><h1>Bienvenido a Venta de Destinación.</h1>
    <h2>Colvivienda</h2>
</div>
<div class="container">
       <div class="container__form">
          <label class="container__label" for="buscar">Buscar</label> 
          <div class="container__input">
            <input class="container__input-text" type="text" name="buscar" id="buscar">
          </div> 
            <img  class="container__img" src="../imgs/lupa.png" alt="lupa"> 
        </div>

      
       <div class="container__boton">
        <div class="container__boton-volver">
          <a href="botones.php" class="container__boton-volver-text">Volver</a>
        </div> 
        <div class="container__boton-insertar">
         <a href="../Insert/insertar_destinacion-forma.php" class="container__boton-insertar-text">Insertar</a>
        </div>
      </div>
    </div> 
    <?php 
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select * from destinacion;");

    //primera fila
    echo "<table>";
    echo "
      <tr>
        <th>Codigo de la Destinación</th>
        <th>Descripcion de destinación</th>
     </tr>";
    
      //Segunda Fila en adelante
        
      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

            echo "<tr>";
            echo "<td>".$row['codigo_destinacion']."</td>";
            echo "<td>".$row['descripcion']."</td>";
            echo "<td><a href='../update/destinacion.php?codigo=".$row['codigo_destinacion']."'>Editar</a></td>";
            echo "<td><a href='javascript:preguntar(\"".$row['codigo_destinacion']."\")'>Eliminar</a></td>";
           
            echo "</tr>";
         }  
    
    
    echo "</table>";
    
    
    ?>
</body>
</html>