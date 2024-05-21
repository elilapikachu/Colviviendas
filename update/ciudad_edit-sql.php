<?php

include_once "../modulo/conexion.php";

try{

    $vcodigo = filter_var($_POST['codigo']);
    $vdescri = filter_var($_POST['descripcion']);

    $update = $conexion->prepare("update ciudad SET  codigo_ciudad = :A,  descripcion= :B
    where codigo_ciudad = :primaria");
    $update->bindParam(':A', $vcodigo);
    $update->bindParam(':B', $vdescri);
    $update->bindParam(':primaria', $vcodigo);

    $update->execute();

    header("location: ../read/pagina_de_ciudad.php");
    exit();

    }
catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
    echo "<a href= ../read/pagina_de_ciudad.php>Volver</a>";
}