<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
</head>
<style>
    
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    background-color: #01E5D4;
            }
    th {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    background-color:chartreuse;

            }

        

    tr:hover {background-color: aqua;}

    </style>
<body>

    <h1>Insertar nueva Persona</h1>
    <div class="container__boton">
        <a href="Persona.php">Devolver a Persona</a>
    </div>
    <form action="insertar_persona.php" method="POST">
      <?php 
        echo '<label for="identificacion" >Su numero de identificación</label>';
        echo "<input type='text' id='codigo' name='identificacion' value=''>";
        
         

        ?>

      <input type="submit" value="Insertar Persona">
    </form>
    
</body>
</html>