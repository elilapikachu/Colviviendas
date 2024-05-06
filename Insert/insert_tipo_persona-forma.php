<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Tipo</title>
</head>
<body>

    <h1>Insertar nuevo Tipo de Persona</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_tipo_persona.php">Devolver a Tipo Persona</a>
    </div>
    <form action="insertar_tipo_persona.php" method="POST">
      <?php 
        echo '<label for="codigo" >Codigo del tipo</label>';
        echo "<input type='text' id='codigo' name='codigo' value=''>";

        echo '<label for="descripcion">Descripcion del tipo</label>';
        echo "<input type='text' id='descripcion' name='descripcion' value=''>";

        
        ?>

      <input type="submit" value="Insertar tipo de Persona">
    </form>
    
</body>
</html>