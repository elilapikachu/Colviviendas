<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_POST["codigo"]);
    $vdescrip = filter_var($_POST["descripcion"]);
    

    //realizar la sintaxis del insert en sql para realizar el añadido

    $insertar = $conexion->prepare("insert into estado (
        codigo_estado, 
        descripcion)
        values (:A,:B)");

        //Aqui se añaden los valores de las variables al insert

        $insertar->bindParam(':A',$vcodigo);
        $insertar->bindParam(':B',$vdescrip);
        $insertar->execute();

         header("location: ../read/pagina_de_estado.php");

} catch (PDOException $e) {
//Error;
$error= $e->getCode();

if ($error==23000){
  echo '<script>confirmar=confirm("Ese codigo de estado ya existe");
          if (confirmar)
            window.location.href="insertar_estado-forma.php";</script>';
          echo "<a href= insertar_estado-forma.php>Volver</a>";
}else{
  echo 'Error' . $e->getMessage();
  echo 'Error' . $e->getCode();
  echo "<a href= insertar_estado-forma.php> Volver</a>";

}
}
