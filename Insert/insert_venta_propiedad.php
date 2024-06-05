<?php

include_once "../modulo/conexion.php";

try {

  //se crean las variables
  $vventa = filter_var($_POST["venta"]);
  $vpropiedad = filter_var($_POST["propiedad"]);
  $vfecha = filter_var($_POST["fecha"]);
  $vprecio = filter_var($_POST["precio"]);


  //realizar la sintaxis del insert en sql para realizar el añadido

  $insertar = $conexion->prepare("insert into tipo_persona(
        nro_venta,	
        codigo_propiedad,	
        fecha_entrega,	
        precio_final)
        values (:A,:B,:C,:D)");

  //Aqui se añaden los valores de las variables al insert

  $insertar->bindParam(':A', $vventa);
  $insertar->bindParam(':B', $vpropiedad);
  $insertar->bindParam(':C', $vfecha);
  $insertar->bindParam(':D', $vprecio);
  $insertar->execute();

  header("location: ../read/pagina_de_tipo_persona.php");

} catch (PDOException $e) {
  //Error;
  $error = $e->getCode();

  if ($error == 23000) {
    echo '<script>confirmar=confirm("Esa combinacion de venta de propiedad ya existe");
          if (confirmar)
            window.location.href="insertar_venta_propiedad-forma.php";</script>';
    echo "<a href= insertar_venta_propiedad-forma.php>Volver</a>";
  } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href= insertar_venta_propiedad-forma.php>Volver</a>";
  }
}