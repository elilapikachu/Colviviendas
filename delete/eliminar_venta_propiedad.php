<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);
    $vcodigo2 = filter_var($_GET['codigo2']);

    $delete = $conexion->prepare("DELETE FROM venta_propiedad WHERE nro_venta = :codigo and codigo_propiedad = :codigo2");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->bindParam(':codigo2', $vcodigo2);
    $delete->execute();
    
    header("location: ../read/pagina_de_venta_propiedad.php");
    
    } catch (PDOException $e) {
        //Error;
        echo 'Error' . $e->getMessage();
    }
    ?>