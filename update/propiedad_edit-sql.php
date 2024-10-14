<?php

include_once "../modulo/conexion.php";
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_FILES['foto']['name'])) {
        // Ruta para guardar el archivo de foto física
        $target_dir = "C:/xampp/htdocs/Colviviendas/imgs/casas/";
        // Concateno con el nombre del archivo para guardar en el servidor el archivo físico
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);

        // Ruta para guardar en el registro de la base de datos
        $foto_guardar = "http://localhost/Colviviendas/imgs/casas/";
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
        $matriz1 = $conexion->query("SELECT foto FROM propiedad WHERE codigo_propiedad ='" . $_POST['codigo'] . "'");
        $row = $matriz1->fetch();
        $vfoto = $row['foto'];
    }
    try {

        //se crean las variables
        $vcodigo = filter_var($_POST["codigo"]);
        $vdireccion = filter_var($_POST["direccion"]);
        $vestado = filter_var($_POST["estado"]);
        $vpropietario = filter_var($_POST["propietario"]);
        $vpago = filter_var($_POST["pago"]);
        $vciudad = filter_var($_POST["ciudad"]);
        $vbarrio = filter_var($_POST["barrio"]);
        $vprecio = filter_var($_POST["precio"]);
        $vmodelo = filter_var($_POST["modelo"]);
        $vtipo = filter_var($_POST["tipo"]);
        $vedad = filter_var($_POST["edad"]);
        $vdestinacion = filter_var($_POST["destinacion"]);
        $vmetros = filter_var($_POST["metro"]);
        $vhabitacion = filter_var($_POST["habitacion"]);
        $vbano = filter_var($_POST["bano"]);
        $vgaraje = filter_var($_POST["garaje"]);
        $vfecha = filter_var($_POST["fecha"]);

        $update = $conexion->prepare("UPDATE propiedad SET direccion = :direccion, foto = :foto, estado = :estado,
        propietario = :propietario, metodo_pago = :metodo_pago, ciudad = :ciudad, barrio = :barrio, precio = :precio, modelo = :modelo ,fecha_registro = :fecha_registro,
        tipo_propiedad = :tipo, edad = :edad, destinacion = :destinacion, nro_metros = :nro_metros, nro_banos = :nro_banos, nro_garajes = :nro_garajes, nro_habitaciones = :nro_habitaciones
        where codigo_propiedad = :primaria ;");

        $update->bindParam(':direccion', $vdireccion);
        $update->bindParam(':foto', $vfoto);
        $update->bindParam(':propietario', $vpropietario);
        $update->bindParam(':metodo_pago', $vpago);
        $update->bindParam(':ciudad', $vciudad);
        $update->bindParam(':fecha_registro', $vfecha);
        $update->bindParam(':barrio', $vbarrio);
        $update->bindParam(':precio', $vprecio);
        $update->bindParam(':modelo', $vmodelo);
        $update->bindParam(':tipo', $vtipo);
        $update->bindParam(':edad', $vedad);
        $update->bindParam(':estado', $vestado);
        $update->bindParam(':destinacion', $vdestinacion);
        $update->bindParam(':nro_metros', $vmetros);
        $update->bindParam(':nro_banos', $vbano);
        $update->bindParam(':nro_habitaciones', $vhabitacion);
        $update->bindParam(':nro_garajes', $vgaraje);
        $update->bindParam(':primaria', $vcodigo);


        $update->execute();

        header("location: ../read/pagina_de_propiedad.php");

    } catch (PDOException $e) {
        //Error;

        $error = $e->getCode();


        echo 'Error' . $e->getMessage();
        echo 'Error' . $e->getCode();
        echo "<a href='../read/pagina_de_propiedad.php'> Volver </a>";

    }
}