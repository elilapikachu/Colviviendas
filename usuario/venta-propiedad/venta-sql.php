<?php

session_start();

include_once "../modulo/conexion.php";

function generarCodigoAlfanumerico($longitud = 20)
{
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $codigo = '';
  for ($i = 0; $i < $longitud; $i++) {
    $codigo .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
  }
  return $codigo;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["foto"])) {
  $target_dir = "C:/xampp/htdocs/Colviviendas/imgs/casas/";
  $foto_guardar = "http://localhost/Colviviendas/imgs/casas/";
  $target_file = $target_dir . basename($_FILES['foto']['name']);
  $target_file1 = $foto_guardar . basename($_FILES['foto']['name']);

  $check = getimagesize($_FILES['foto']['tmp_name']);
  if ($check === false) {
    echo '<script>confirmar=confirm("El archivo no es una imagen");
    if (confirmar)
      window.location.href="insertar_forma.php";</script>';
    echo "<a href= insertar_forma.php>Volver</a>";
  }
  //verifico el tamaño
  if ($_FILES['foto']['size'] > 5000000) {
    echo '<script>confirmar=confirm("El archivo es demasiado grande");
    if (confirmar)
      window.location.href="insertar_forma.php";</script>';
    echo "<a href= insertar_forma.php>Volver</a>";
  }
  // mueve el archivo a la ruta destino
  if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
    $foto_path = $target_file;
    // echo "El archivo se ha subido correctamente: ". $foto_path;
  } else {
    echo "hubo un error al subir este archivo";
  }

  try {

    //se crean las variables
    $vcodigo = generarCodigoAlfanumerico();
    $vdireccion = filter_var($_POST["direccion"]);
    $vfoto = $target_file1;
    $vestado = filter_var($_POST["estado"]);
    $vpropietario = $_SESSION['identificacion'];
    $vpago = filter_var($_POST["pago"]);
    $vciudad = filter_var($_POST["ciudad"]);
    $vbarrio = filter_var($_POST["barrio"]);
    $vprecio = filter_var($_POST["precio"]);
    $vmodelo = filter_var($_POST["modelo"]);
    $vtipo = filter_var($_POST["tipo"]);
    $vedad = filter_var($_POST["edad"]);
    $vdestinacion = filter_var($_POST["destinacion"]);
    $vmetros = filter_var($_POST["metro"]);
    $vhabitacion = filter_var($_POST["habitacion"]);
    $vbano = filter_var($_POST["bano"]);
    $vgaraje = filter_var($_POST["garaje"]);
    $vfecha = date('Y-m-d');


    //realizar la sintaxis del insert en sql para realizar el añadido

    $insertar = $conexion->prepare("insert into propiedad (
        codigo_propiedad,	
        direccion,
        foto,	
        estado,	
        propietario,	
        metodo_pago,	
        ciudad,	
        barrio,	
        precio,	
        modelo,	
        fecha_registro,
        tipo_propiedad,	
        edad,	
        destinacion,
        nro_metros,
        nro_banos,
        nro_habitaciones,
        nro_garajes
       )
        values (:codigo,:direcci,:foto,:esta,:propie,:met_pago,:ciuda,:barri,:precio,:modelo,:fecha,:tipo,:edad,:desti,:nro_metros,:nro_banos,:nro_habitaciones,:nro_garajes)");

    //Aqui se añaden los valores de las variables al insert


    $insertar->bindParam(':codigo', $vcodigo);
    $insertar->bindParam(':direcci', $vdireccion);
    $insertar->bindParam(':foto', $vfoto);
    $insertar->bindParam(':esta', $vestado);
    $insertar->bindParam(':propie', $vpropietario);
    $insertar->bindParam(':met_pago', $vpago);
    $insertar->bindParam(':ciuda', $vciudad);
    $insertar->bindParam(':barri', $vbarrio);
    $insertar->bindParam(':precio', $vprecio);
    $insertar->bindParam(':modelo', $vmodelo);
    $insertar->bindParam(':fecha', $vfecha);
    $insertar->bindParam(':tipo', $vtipo);
    $insertar->bindParam(':edad', $vedad);
    $insertar->bindParam(':desti', $vdestinacion);
    $insertar->bindParam(':nro_metros', $vmetros);
    $insertar->bindParam(':nro_banos', $vbano);
    $insertar->bindParam(':nro_habitaciones', $vhabitacion);
    $insertar->bindParam(':nro_garajes', $vgaraje);

    $insertar->execute();

    header("location: propiedades-vendedor.php");

  } catch (PDOException $e) {
    //Error;
    $error = $e->getCode();

    if ($error == 23000) {
      echo '<script>confirmar=confirm("Ese codigo de propiedad ya existe");
          if (confirmar)
         window.location.href="venta.php";</script>';
      echo "<a href= venta.php>Volver</a>";
    } else {
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href= venta.php> Volver</a>";
      // }
    }
  }
} else {
  echo '<script>confirmar=confirm("Llene el campo foto");
  if (confirmar)
    window.location.href="venta.php";</script>';
  echo "<a href= venta.php>Volver</a>";
}


