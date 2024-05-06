<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Propiedad</title>
</head>
<body>

    <h1>Insertar nueva Propiedad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_propiedad.php">Devolver a Propiedad</a>
    </div>
    <form action="insertar_propiedad.php" method="POST">
      <?php 
        echo '<label for="codigo" >Codigo de la propiedad</label>';
        echo "<input type='text' id='codigo' name='codigo' value=''>";

        echo '<label for="direccion">Direccion de la propiedad</label>';
        echo "<input type='text' id='direccion' name='direccion' value=''>";

        echo '<label for="foto" >Foto de la propiedad</label>';
        echo "<input type='text' id='foto' name='foto' value=''>";

        echo '<label for="estado" >Estado de la propiedad</label>';
        echo "<input type='text' id='estado' name='estado' value=''>";

        echo '<label for="propietario" >Identificacion del propietario</label>';
        echo "<input type='text' id='propietario' name='propietario' value=''>";

        echo '<label for="pago" >Metodo de pago</label>';
        echo "<input type='text' id='pago' name='pago' value=''>";

        echo '<label for="ciudad" >Ciudad</label>';
        echo "<input type='text' id='ciudad' name='ciudad' value=''>";

        echo '<label for="barrio" >Barrio</label>';
        echo "<input type='text' id='barrio' name='barrio' value=''>";

        echo '<label for="precio" >Precio</label>';
        echo "<input type='int' id='precio' name='precio' value=''>";

        echo '<label for="modelo" >Modelo de la propiedad</label>';
        echo "<input type='text' id='modelo' name='modelo' value=''>";

        echo '<label for="tipo" >Tipo de la propiedad</label>';
        echo "<input type='text' id='tipo' name='tipo' value=''>";

        echo '<label for="edad" >Edad de la propiedad</label>';
        echo "<input type='int' id='edad' name='edad' value=''>";

        echo '<label for="destinacion" >Destinación de la propiedad</label>';
        echo "<input type='text' id='destinacion' name='destinacion' value=''>";

        echo '<label for="fecha" >fecha de registro de la propiedad</label>';
        echo "<input type='datetime-local' id='fecha' name='fecha' value=''>";  

    
        ?>

      <input type="submit" value="Insertar propiedad">
    </form>
    
</body>
</html>