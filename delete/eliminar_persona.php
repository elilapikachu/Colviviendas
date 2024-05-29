<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);

    $delete = $conexion->prepare("DELETE FROM persona WHERE identificacion = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();
    
    header("location: ../read/Persona.php");
    
    } catch (PDOException $e) {
        //Error;
        echo 'Error' . $e->getMessage();
    }
    ?>