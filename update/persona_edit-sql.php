<?php

include_once "../modulo/conexion.php";

//Se verifica que la solicitud sea POST y que el archivo haya sido subido.
if ($_SERVER['REQUEST_METHOD'] = 'POST' ) {
    //ruta para guardar el archivo de foto física
    $target_dir = "C:/xampp/htdocs/img/";
    //concateno con el nombre del archivo para guardar en el servidor el archivo fisico
    $target_file = $target_dir . basename($_FILES["fot"]["name"]);

    //ruta para guardar en el registro de la base de datos
    $foto_guardar="http://localhost/img/";
    //concateno con el nombre para guardar en la base de datos
    $target_file1 = $foto_guardar . basename($_FILES["fot"]["name"]);
   
if(isset($_FILES['fot'])){ 
        // Verifica el tipo de archivo (por ejemplo, solo imágenes)
            $check = getimagesize($_FILES["fot"]["tmp_name"]);
            if ($check === false) {
            echo "El archivo no es una imagen.";
            exit;
            }

        // Verifica el tamaño del archivo (por ejemplo, máximo 5MB)
        if ($_FILES["fot"]["size"] > 5000000) {
            echo "El archivo es demasiado grande.";
            exit;
        }




        // Mueve el archivo a la ruta de destino
        if (move_uploaded_file($_FILES["fot"]["tmp_name"], $target_file)) {
            $foto_path = $target_file;
            echo "El archivo se ha subido correctamente: " . $foto_path;
        } else {
            echo "Hubo un error al subir el archivo.";
        }

        $vfoto = $target_file1;

}
//cierra el if de la foto
else {


    $matriz1 = $conexion->query("select id_persona, foto from persona where id_persona ='".$_POST['identificacion']."'");
    $row = $matriz1->fetch();
    $vfoto = $row['foto'];
}
try{


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

    