<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Modificar Venta Propiedad</title>
</head>
<body>

    <h1>Modificar venta Propiedad</h1>
    <div class="container__boton">
        <a href="../read/pagina_de_venta_propiedad.php">Devolver a Venta de Propiedad</a>
    </div>
    <form action="venta-propiedad_sql.php" method="POST">
      <?php 

$vcodigo = filter_var($_GET['codigo']);

$mysql_host = 'localhost';
    $mysql_user = 'root';
    $password = '';

    $dbhandle = mysqli_connect ($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');

    $selected = mysqli_select_db ($dbhandle, 'colviviendas') or die("No se encontro el esquema");

    $matriz = mysqli_query($dbhandle, "select a.nro_venta, a.codigo_propiedad, b.direccion, a.fecha_entrega, b.precio, a.precio_final FROM venta_propiedad a, propiedad b WHERE a.codigo_propiedad = b.codigo_propiedad and a.nro_venta ='".$vcodigo."';");


    while ($row = mysqli_fetch_array($matriz, MYSQLI_ASSOC)) {  
        echo '<label for="venta" >Numero de venta</label>';
        echo "<input type='text' id='venta' name='venta' value='".$vcodigo."' readonly>";

        echo '<label for="propiedad">Codigo de la Propiedad</label>';
        echo "<input type='text' id='propiedad' name='propiedad' value='".$row['codigo_propiedad']."' readonly>";

        echo '<label for="fecha">Fecha de entrega</label>';
        echo "<input type='text' id='fecha' name='fecha' value='".$row['fecha_entrega']."' readonly>";

        echo '<label for="precio">Precio final de la venta</label>';
        echo "<input type='int' id='precio' name='precio' value='".$row['precio_final']."'>";
    }
        ?>

      <input type="submit" value="Modificar">
    </form>
    
</body>
</html>