<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Estado</title>
</head>
<body>

    <h1>Insertar nuevo Estado</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_estado.php">Devolver a Estado</a>
    </div>
    <form action="insertar_estado.php" method="POST">
      <?php 
        echo '<label for="codigo" >Codigo del estado</label>';
        echo "<input type='text' id='codigo' name='codigo' value=''>";

        echo '<label for="descripcion">Descripción del estado</label>';
        echo "<input type='text' id='descripcion' name='descripcion' value=''>";

        
        ?>

      <input type="submit" value="Insertar Estado">
    </form>
    
</body>
</html>