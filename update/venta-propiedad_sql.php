<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vventa = filter_var($_POST["venta"]);
    $vpropiedad = filter_var($_POST["propiedad"]);
    $vfecha = filter_var($_POST["fecha"]);
    $vprecio = filter_var($_POST["precio"]);

    $update = $conexion->prepare("update venta_propiedad SET  nro_venta = :A,  codigo_propiedad = :B, fecha_entrega = :C, precio_final = :D
    where nro_venta = :primaria and codigo_propiedad = :primaria2");
    $update->bindParam(':A', $vventa);
    $update->bindParam(':B', $vpropiedad);
    $update->bindParam(':C', $vfecha);
    $update->bindParam(':D', $vprecio);
    $update->bindParam(':primaria', $vventa);
    $update->bindParam(':primaria2', $vpropiedad);

    $update->execute();

    header("location: ../read/pagina_de_venta_propiedad.php");
    exit();
}

catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
    echo "<a href= ../read/pagina_de_venta_propiedad.php>Volver</a>";
}