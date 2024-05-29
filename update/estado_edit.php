<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Editar Estado</title>
</head>
<body>

    <h1>editar Estado</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_estado.php">Devolver a Estado</a>
    </div>
    <form action="estado-edit_sql.php" method="POST">
      <?php 
        $vcodigo = filter_var($_GET['codigo']);

        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';
    
        $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');
    
        $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");
    
        $matriz = mysqli_query($dbhandle, "select * from estado where codigo_estado ='".$vcodigo."' ;");

        while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

        echo '<label for="codigo" >Codigo del estado</label>';
        echo "<input type='text' id='codigo' name='codigo'  value='".$vcodigo."' readonly>";

        echo '<label for="descripcion">Descripción del estado</label>';
        echo "<input type='text' id='descripcion' name='descripcion' value='".$row['descripcion']."'>";
        }
        
        ?>

      <input type="submit" value="Modificar">
    </form>
    
</body>
</html>