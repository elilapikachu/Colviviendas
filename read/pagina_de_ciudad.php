<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reads.css">
    <title>Document</title>    
</head>
<style>
  .container__img{
    width: 30px;
    height: 30px;
    margin-left: 5px;
}  

.container__boton {
    display: flex;
    flex-direction: row;
    gap: 12px;

}


.container__boton-volver {
  text-align: center;
    height: 30px;
    width: 100px;
    background-color: #636161;
    border-radius: 15px;
}

.container__boton-insertar {
    text-align: center;
    height: 30px;
    width: 100px;
    text-decoration: none;
    background-color: #131212;
    border-radius: 15px;
}

.container__boton-volver-text {
    text-align: center;
    color: #000000;
    text-decoration: none;
}

.container__boton-insertar-text {
    text-align: center;
    color: aliceblue;
    text-decoration: none;
}

.container__boton-volver-text:hover {
    color: aliceblue;
}

.container__boton-volver:hover {
    background-color: #131212;
}


.container__boton-insertar:hover {
    background-color: #636161;
}

.container__boton-insertar-text:hover{
    color: #000000;
}


</style>
<body>
<div class="letrero"><h1>Bienvenido a ciudad.</h1>
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
         <a href="../Insert/insertar_ciudad-forma.php" class="container__boton-insertar-text">Insertar</a>
        </div>
      </div>
    </div> 
    <?php 
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select * from ciudad;");

    //primera fila
    echo "<table>";
    echo "
      <tr>
        <th>Codigo</th>
        <th>Nombre de la ciudad</th>
     </tr>";
    
      //Segunda Fila en adelante
        
      while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

            echo "<tr>";
            echo "<td>".$row['codigo_ciudad']."</td>";
            echo "<td>".$row['descripcion']."</td>";
            echo "<td><a href='../update/ciudad_edit.php?codigo=".$row['codigo_ciudad']."'>Editar</a></td>";
            echo "<td><a href=''>Eliminar</a></td>";
           
         }  
    
    
    echo "</table>";
    
    
    
    
    
    ?>
</body>
</html>