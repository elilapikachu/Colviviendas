<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);

    $delete = $conexion->prepare("DELETE FROM tipo_persona WHERE codigo_tipo = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();

    header("location: ../read/pagina_de_tipo_persona.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>