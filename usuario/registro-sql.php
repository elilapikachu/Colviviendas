<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables

    $videntificacion = filter_var($_POST["identificacion"]);
    $vnombre = filter_var($_POST["nombre"]);
    $vapellido = filter_var($_POST["apellido"]);
    $vfecha_registro = date('Y-m-d H:i:s');
    $vtipo_persona = filter_var($_POST["tipo"]);
    $vcontrasena = filter_var($_POST["contrasena"]);
    $vcorreo = filter_var($_POST["email"]);
    $vfoto = 'http://localhost/Colviviendas/imgs/usuarios/foto-inicial.png';


    session_start();
    $_SESSION['usuario'] = $vnombre;
    $_SESSION['usuario-apellido'] = $vapellido;
    $_SESSION['tipo_persona'] = $vtipo_persona;
    $_SESSION['identificacion'] = $videntificacion;

    $insertar = $conexion->prepare("insert into persona (
        identificacion, 
        nombre, 
        apellido, 
        fecha_registro,
        tipo_persona, 
        contrasena,
        correo,
        foto)
        values (:identificacion, :nombre, :apellido, :fecha, :tipo,:contrasena, :correo, :foto );");

    $insertar->bindParam(':identificacion', $videntificacion);
    $insertar->bindParam(':nombre', $vnombre);
    $insertar->bindParam(':apellido', $vapellido);
    $insertar->bindParam(':fecha', $vfecha_registro);
    $insertar->bindParam(':tipo', $vtipo_persona);
    $insertar->bindParam(':correo', $vcorreo);
    $insertar->bindParam(':foto', $vfoto);
    $insertar->bindParam(':contrasena', $vcontrasena);

    $insertar->execute();

    header("location: index.php");

    exit;

} catch (PDOException $e) {
    //Error;
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Ese codigo de usuario ya existe");
              window.location.href="registro.php";</script>';

    } else {
        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo 'window.location.href="registro.php"';


    }

}