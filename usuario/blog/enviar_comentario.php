<?php

include_once "../modulo/conexion.php";
session_start();

function generarCodigoAlfanumerico($longitud = 20)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[mt_rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

try {

    //se crean las variables
    $vcodigo = generarCodigoAlfanumerico();
    $vcomentario = filter_var($_POST["comentario"]);
    $vusuario = $_SESSION['identificacion'];
    $vfecha = date('Y-m-d');


    //realizar la sintaxis del insert en sql para realizar el añadido
    if (!empty($vcomentario)) {
        $insertar = $conexion->prepare("insert into comentarios (
        id, 
        usuario,
        comentario,
        fecha)
        values (:id,:usuario, :comentario, :fecha)");

        //Aqui se añaden los valores de las variables al insert

        $insertar->bindParam(':id', $vcodigo);
        $insertar->bindParam(':usuario', $vusuario);
        $insertar->bindParam(':comentario', $vcomentario);
        $insertar->bindParam(':fecha', $vfecha);
        $insertar->execute();

        header("location: blog.php");
    } else {
        echo '
      <script>
      alert("¡Debes tener contenido en tu comentario!");
      window.location.href="blog.php";
      </script>';
    }
} catch (PDOException $e) {
    //Error;
    $error = $e->getCode();

    if ($error == 23000) {
        echo '<script>confirmar=confirm("Ese codigo de comentario ya existe");
          if (confirmar)
            window.location.href="blog.php";</script>';
        echo "<a href= blog.php>Volver</a>";
    } else {
        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo "<a href= blog.php> Volver</a>";
    }
}
