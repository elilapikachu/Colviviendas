<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);

    $delete = $conexion->prepare("DELETE FROM persona WHERE identificacion = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();

    header("location: ../read/Persona.php");

} catch (PDOException $e) {
    //Error;
 
    
    if ($error==23000){
      echo '<script>confirmar=confirm("Ese tiene asociado registros no puede borrarse");
              if (confirmar)
                window.location.href="../read/Persona.php";</script>';
              echo "<a href=../read/Persona.php>Volver</a>";
    }else{
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href=../read/Persona.php>Volver</a>";
    }
}
?>