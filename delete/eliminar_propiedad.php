<?php

include_once "../modulo/conexion.php";

try {

  //se crean las variables
  $vcodigo = filter_var($_GET['codigo']);

  $delete = $conexion->prepare("DELETE FROM propiedad WHERE codigo_propiedad = :codigo");
  $delete->bindParam(':codigo', $vcodigo);
  $delete->execute();

  header("location: ../read/pagina_de_propiedad.php");

} catch (PDOException $e) {
  //Error;

  $error = $e->getCode();
  if ($error == 23000) {
    echo '<script>confirmar=confirm("Ese tiene asociado registros no puede borrarse");
              if (confirmar)
                window.location.href="../read/pagina_de_propiedad.php";</script>';
    echo "<a href='../read/pagina_de_propiedad.php'>Volver</a>";
  } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href='../read/pagina_de_propiedad.php'>Volver</a>";
  }
}
?>