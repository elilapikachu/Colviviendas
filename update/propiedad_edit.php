<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Insertar Propiedad</title>
</head>
<body>

    <h1>Editar Propiedad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_propiedad.php">Devolver a Propiedad</a>
    </div>
    <form action="../read/pagina_de_propiedad.php" method="POST">
      <?php 
        $vcodigo = filter_var($_GET['codigo']);
        $mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "SELECT a.codigo_propiedad, a.direccion, a.foto, b.descripcion as estado, c.identificacion, d.descripcion, e.descripcion as ciudad, f.descripcion as barrio, a.precio, g.descripcion as modelo, a.fecha_registro, h.descripcion as tipo_propiedad, a.edad, i.descripcion as destinacion FROM propiedad a, estado b, persona c, metodo_pago d, ciudad e, barrio f, modelo g, tipo_propiedad h, destinacion i where a.estado = b.codigo_estado and a.propietario = c.identificacion and a.metodo_pago = d.codigo_metodo and a.ciudad = e.codigo_ciudad and a.barrio = f.codigo_barrio and a.modelo = g.codigo_modelo and a.tipo_propiedad = h.codigo_tipo and a.destinacion = i.codigo_destinacion;");

    while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  

        echo '<label for="codigo" >Codigo de la propiedad</label>';
        echo "<input type='text' id='codigo' name='codigo' value='".$vcodigo."' readonly>";

        echo '<label for="direccion">Direccion de la propiedad</label>';
        echo "<input type='text' id='direccion' name='direccion'  value='".$row['direccion']."'>";

        echo '<label for="foto" >Foto de la propiedad</label>';
        echo "<input type='text' id='foto' name='foto' value='' value='".$row['foto']."'>";

        echo '<label for="estado" >Estado de la propiedad</label>';
        echo "<input type='text' id='estado' name='estado' value='' value='".$row['estado']."'>";

        echo '<label for="propietario" >Identificacion del propietario</label>';
        echo "<input type='text' id='propietario' name='propietario'  value='".$row['identificacion']."'>";

        echo '<label for="pago" >Metodo de pago</label>';
        echo "<input type='text' id='pago' name='pago'  value='".$row['descripcion']."'>";

        echo '<label for="ciudad" >Ciudad</label>';
        echo "<input type='text' id='ciudad' name='ciudad'  value='".$row['ciudad']."'>";

        echo '<label for="barrio" >Barrio</label>';
        echo "<input type='text' id='barrio' name='barrio'  value='".$row['barrio']."'>";

        echo '<label for="precio" >Precio</label>';
        echo "<input type='int' id='precio' name='precio'  value='".$row['pecio']."'>";

        echo '<label for="modelo" >Modelo de la propiedad</label>';
        echo "<input type='text' id='modelo' name='modelo'  value='".$row['modelo']."'>";

        echo '<label for="tipo" >Tipo de la propiedad</label>';
        echo "<input type='text' id='tipo' name='tipo'  value='".$row['tipo_propiedad']."'>";

        echo '<label for="edad" >Edad de la propiedad</label>';
        echo "<input type='int' id='edad' name='edad'  value='".$row['edad']."'>";

        echo '<label for="destinacion" >Destinación de la propiedad</label>';
        echo "<input type='text' id='destinacion' name='destinacion'  value='".$row['destinacion']."'>";

        echo '<label for="fecha" >fecha de registro de la propiedad</label>';
        echo "<input type='datetime-local' id='fecha' name='fecha'  value='".$row['fecha_registro']."'>";  

    }
        ?>

      <input type="submit" value="Modificar propiedad">
    </form>
    
</body>
</html>