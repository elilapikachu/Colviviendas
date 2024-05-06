<?php

include_once "../modulo/conexion.php";

try{

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
        correo)
        values (:A,:B,:C,:D,:E,:F,:G,:H,:I,:J)");

        //Aqui se añaden los valores de las variables al insert

        $insertar->bindParam(':A',$videntificacion);
        $insertar->bindParam(':B',$vnombre);
        $insertar->bindParam(':C',$vapellido);
        $insertar->bindParam(':D',$vdireccion);
        $insertar->bindParam(':E',$vtelefono);
        $insertar->bindParam(':F',$vciudad);
        $insertar->bindParam(':G',$vfecha_registro);
        $insertar->bindParam(':H',$vtipo_persona);
        $insertar->bindParam(':I',$vcontrasena);
        $insertar->bindParam(':J',$vcorreo);
        $insertar->execute();

         header("location: ../read/Persona.php");

} catch (PDOException $e) {
//Error;
$error= $e->getCode();

if ($error==23000){
  echo '<script>confirmar=confirm("Ese codigo de Persona ya existe");
          if (confirmar)
            window.location.href="insertar_forma.php";</script>';
          echo "<a href= insertar_forma.php>Volver</a>";
}else{
  echo 'Error' . $e->getMessage();
  echo 'Error' . $e->getCode();
  echo "<a href= insertar_forma.php> Volver</a>";
}
}

