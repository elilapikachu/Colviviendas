<?php

include_once "../modulo/conexion.php";
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_FILES['foto']['name'])) {
        // Ruta para guardar el archivo de foto física
        $target_dir = "C:/xampp/htdocs/Colviviendas/imgs/usuarios/";
        // Concateno con el nombre del archivo para guardar en el servidor el archivo físico
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);

        // Ruta para guardar en el registro de la base de datos
        $foto_guardar = "http://localhost/Colviviendas/imgs/usuarios/";
        // Concateno con el nombre para guardar en la base de datos
        $target_file1 = $foto_guardar . basename($_FILES["foto"]["name"]);

        // Verifica el tipo de archivo (por ejemplo, solo imágenes)
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen.";
            exit();
        }

        // Verifica el tamaño del archivo (por ejemplo, máximo 5MB)
        if ($_FILES["foto"]["size"] > 5000000) {
            echo "El archivo es demasiado grande.";
            exit();
        }

        // Mueve el archivo a la ruta de destino
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $vfoto = $target_file1;
            echo "El archivo se ha subido correctamente: " . $target_file1;
        } else {
            echo "Hubo un error al subir el archivo.";
            exit();
        }
    } else {
        // Si no se subió una nueva foto, obtén la foto actual de la base de datos
        $matriz1 = $conexion->query("SELECT foto FROM persona WHERE identificacion ='" . $_POST['identificacion'] . "'");
        $row = $matriz1->fetch();
        $vfoto = $row['foto'];
    }
    try {


        //se crean las variables
        $videntificacion = filter_var($_POST["identificacion"]);
        $vnombre = filter_var($_POST["nombre"]);
        $vapellido = filter_var($_POST["apellido"]);
        $vdireccion = filter_var($_POST["direccion"]);
        $vtelefono = filter_var($_POST["telefono"]);
        $vciudad = filter_var($_POST["ciudad"]);
        $vfecha_registro = filter_var($_POST["fecha"]);
        $vtipo_persona = filter_var($_POST["tipo"]);
        $vcontrasena = filter_var($_POST["contrasena"]);
        $vcorreo = filter_var($_POST["email"]);

        $update = $conexion->prepare("UPDATE persona SET identificacion = :primaria, nombre = :nombre, apellido = :apellido, direccion = :direccion,
        telefono = :telefono, ciudad = :ciudad, fecha_registro = :fecha_registro, tipo_persona = :tipo, contrasena = :contrasena,
        correo = :correo, foto = :foto
        where identificacion = :primaria ;");

        $update->bindParam(':nombre', $vnombre);
        $update->bindParam(':apellido', $vapellido);
        $update->bindParam(':direccion', $vdireccion);
        $update->bindParam(':telefono', $vtelefono);
        $update->bindParam(':ciudad', $vciudad);
        $update->bindParam(':fecha_registro', $vfecha_registro);
        $update->bindParam(':tipo', $vtipo_persona);
        $update->bindParam(':contrasena', $vcontrasena);
        $update->bindParam(':correo', $vcorreo);
        $update->bindParam(':foto', $vfoto);
        $update->bindParam(':primaria', $videntificacion);

        $update->execute();

        header("location: ../read/Persona.php");

    } catch (PDOException $e) {
        //Error;

        $error = $e->getCode();


        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo "<a href='../read/Persona.php'> Volver </a>";

    }
}


