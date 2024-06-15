<?php

include_once "../modulo/conexion.php";

try {

  //se crean las variables
  $vcodigo = filter_var($_GET['codigo']);

  $delete = $conexion->prepare("DELETE FROM motivo_cita WHERE codigo_motivo = :codigo");
  $delete->bindParam(':codigo', $vcodigo);
  $delete->execute();

  header("location: ../read/pagina_de_motivo.php");

} catch (PDOException $e) {
  //Error;
  $error = $e->getCode();

  if ($error == 23000) {
    echo '<script>confirmar=confirm("Ese tiene asociado registros no puede borrarse");
              if (confirmar)
                window.location.href="../read/pagina_de_motivo.php";</script>';
    echo "<a href=../read/pagina_de_motivo.php>Volver</a>";
  } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=../read/pagina_de_motivo.php>Volver</a>";
  }
}
?>