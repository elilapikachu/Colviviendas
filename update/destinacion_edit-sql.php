<?php

include_once "../modulo/conexion.php";

try{

    $vcodigo = filter_var($_POST['codigo']);
    $vdescri = filter_var($_POST['descripcion']);

    $update = $conexion->prepare("update destinacion SET  codigo_destinacion = :A,  descripcion= :B
    where codigo_destinacion = :primaria");
    $update->bindParam(':A', $vcodigo);
    $update->bindParam(':B', $vdescri);
    $update->bindParam(':primaria', $vcodigo);

    $update->execute();

    header("location: ../read/pagina_de_destinacion.php");
    exit();

    }
catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
    echo "<a href= ../read/pagina_de_destinacion.php>Volver</a>";
}