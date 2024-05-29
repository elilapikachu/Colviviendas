<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);

    $delete = $conexion->prepare("DELETE FROM metodo_pago WHERE codigo_metodo = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();
    
    header("location: ../read/pagina_de_metodo_pago.php");
    
    } catch (PDOException $e) {
        //Error;
        echo 'Error' . $e->getMessage();
    }
?>