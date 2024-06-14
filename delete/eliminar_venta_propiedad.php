<?php

include_once "../modulo/conexion.php";

try {

    //se crean las variables
    $vcodigo = filter_var($_GET['codigo']);
    // $vcodigo2 = filter_var($_GET['codigo2']);

    $delete = $conexion->prepare("DELETE FROM venta_propiedad WHERE nro_venta = :codigo");
    $delete->bindParam(':codigo', $vcodigo);
    // $delete->bindParam(':codigo2', $vcodigo2);
    $delete->execute();

    header("location: ../read/pagina_de_venta_propiedad.php");

}catch (PDOException $e) {
    //Error;
 
    
    if ($error==23000){
      echo '<script>confirmar=confirm("Ese tiene asociado registros no puede borrarse");
              if (confirmar)
                window.location.href="../read/pagina_de_venta_propiedad.php";</script>';
              echo "<a href=../read/pagina_de_venta_propiedad.php>Volver</a>";
    }else{
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href=../read/pagina_de_venta_propiedad.php>Volver</a>";
    }
}
?>