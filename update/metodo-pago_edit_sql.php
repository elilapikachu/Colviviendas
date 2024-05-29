<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_POST["codigo"]);
    $vdescrip = filter_var($_POST["descripcion"]);
    
    $update = $conexion->prepare("update metodo_pago SET  codigo_metodo = :A,  descripcion = :B
    where codigo_metodo = :primaria;");
    $update->bindParam(':A', $vcodigo);
    $update->bindParam(':B', $vpropiedad);
    $update->bindParam(':primaria', $vcodigo);


    $update->execute();

    header("location: ../read/pagina_de_metodo_pago.php");
    exit();
}

catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
    echo "<a href= ../read/pagina_de_metodo_pago.php>Volver</a>";
}