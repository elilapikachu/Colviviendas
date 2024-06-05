<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables
    $vcodigo = filter_var($_POST["codigo"]);
    $vdescrip = filter_var($_POST["descripcion"]);

    $update = $conexion->prepare("update tipo_persona SET  codigo_tipo = :A,  descripcion = :B
    where codigo_tipo = :primaria");
    $update->bindParam(':A', $vcodigo);
    $update->bindParam(':B', $vdescrip);
    $update->bindParam(':primaria', $vcodigo);


    $update->execute();

    header("location: ../read/pagina_de_tipo_persona.php");
    exit();
} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
    echo "<a href= ../read/pagina_de_tipo_persona.php>Volver</a>";
}