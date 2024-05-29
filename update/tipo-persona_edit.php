<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Modificar Tipo</title>
</head>
<body>

    <h1>Editar Tipo de Persona</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_tipo_persona.php">Devolver a Tipo Persona</a>
    </div>
    <form action="tipo-persona_edit-sql.php" method="POST">
      <?php 
        $vcodigo = filter_var($_GET['codigo']);

        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';
    
        $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');
    
        $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");
    
        $matriz = mysqli_query($dbhandle, "select * from tipo_persona where codigo_tipo= '".$vcodigo."';");
    
        while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

        echo '<label for="codigo" >Codigo del tipo</label>';
        echo "<input type='text' id='codigo' name='codigo' value='".$vcodigo."'>";

        echo '<label for="descripcion">Descripcion del tipo</label>';
        echo "<input type='text' id='descripcion' name='descripcion' value='".$row['descripcion']."'>";

        }
        ?>

      <input type="submit" value="Modificar">
    </form>
    
</body>
</html>