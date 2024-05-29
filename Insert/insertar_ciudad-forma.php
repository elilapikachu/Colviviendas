<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Ciudad</title>
</head>

<body>

    <h1>Insertar nueva ciudad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_ciudad.php">Devolver a ciudad</a>
    </div>
    <form action="insertar_ciudad.php" method="POST">
      <?php 
        echo '<label for="codigo" >Codigo de la ciudad</label>';
        echo "<input type='text' id='codigo' name='codigo' value=''>";

        echo '<label for="descripcion">Nombre de la ciudad</label>';
        echo "<input type='text' id='descripcion' name='descripcion' value=''>";

        
        ?>

      <input type="submit" value="Insertar ciudad">
    </form>
    
</body>
</html>