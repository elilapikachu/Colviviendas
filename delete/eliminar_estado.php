<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);

    $delete = $conexion->prepare("DELETE FROM estado WHERE codigo_estado = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    $delete->execute();

    header("location: ../read/pagina_de_estado.php");

}catch (PDOException $e) {
    //Error;
 
    
    if ($error==23000){
      echo '<script>confirmar=confirm("Ese tiene asociado registros no puede borrarse");
              if (confirmar)
                window.location.href="../read/Pagina_de_estado.php";</script>';
              echo "<a href=../read/Pagina_de_estado.php>Volver</a>";
    }else{
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href=../read/Pagina_de_estado.php>Volver</a>";
    }
}
?>