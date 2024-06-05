<?php

include_once "../modulo/conexion.php";
//  
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["foto"])) {
  $target_dir = "C:/xampp/htdocs/Colviviendas/imgs/usuarios/";
  $foto_guardar = "http://localhost/Colviviendas/imgs/usuarios/";
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
    echo "El archivo se ha subido correctamente: " . $foto_path;
  } else {
    echo "hubo un error al subir este archivo";
  }

  try {


    //se crean las variables
    $videntificacion = filter_var($_POST["identificacion"]);
    $vnombre = filter_var($_POST["nombre"]);
    $vapellido = filter_var($_POST["apellido"]);
    $vdireccion = filter_var($_POST["direccion"]);
    $vtelefono = filter_var($_POST["telefono"]);
    $vciudad = filter_var($_POST["ciudad"]);
    $vfecha_registro = filter_var($_POST["fecha"]);
    $vtipo_persona = filter_var($_POST["tipo"]);
    $vcontrasena = filter_var($_POST["contrasena"]);
    $vcorreo = filter_var($_POST["email"]);
    $vfoto = $target_file1;

    //realizar la sintaxis del insert en sql para realizar el añadido

    $insertar = $conexion->prepare("insert into persona (
        identificacion, 
        nombre, 
        apellido, 
        direccion, 
        telefono,
        ciudad, 
        fecha_registro,
        tipo_persona, 
        contrasena,
        correo,
        foto)
        values (:A,:B,:C,:D,:E,:F,:G,:H,:I,:J,:K);");

    //Aqui se añaden los valores de las variables al insert

    $insertar->bindParam(':A', $videntificacion);
    $insertar->bindParam(':B', $vnombre);
    $insertar->bindParam(':C', $vapellido);
    $insertar->bindParam(':D', $vdireccion);
    $insertar->bindParam(':E', $vtelefono);
    $insertar->bindParam(':F', $vciudad);
    $insertar->bindParam(':G', $vfecha_registro);
    $insertar->bindParam(':H', $vtipo_persona);
    $insertar->bindParam(':I', $vcontrasena);
    $insertar->bindParam(':J', $vcorreo);
    $insertar->bindParam(':K', $vfoto);
    $insertar->execute();

    header("location: ../read/Persona.php");

  } catch (PDOException $e) {
    //Error;
    $error = $e->getCode();

    if ($error == 23000) {
      echo '<script>confirmar=confirm("Ese codigo de Persona ya existe");
          if (confirmar)
            window.location.href="insertar_forma.php";</script>';
      echo "<a href= insertar_forma.php>Volver</a>";
    } else {
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href= insertar_forma.php> Volver</a>";
    }
  }
} else {
  echo '<script>confirmar=confirm("Llene el campo foto");
  if (confirmar)
    window.location.href="insertar_forma.php";</script>';
  echo "<a href= insertar_forma.php>Volver</a>";
}

