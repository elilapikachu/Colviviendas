<?php

include_once "../modulo/conexion.php";

try{

    //se crean las variables
    $vcodigo = filter_var($_POST["codigo"]);
    $vdireccion = filter_var($_POST["direccion"]);
    $vfoto = filter_var ($_POST["foto"]);
    $vestado = filter_var ($_POST["estado"]);
    $vpropietario = filter_var ($_POST["propietario"]);
    $vpago = filter_var ($_POST["pago"]);
    $vciudad = filter_var ($_POST["ciudad"]);
    $vbarrio = filter_var ($_POST["barrio"]);
    $vprecio = filter_var ($_POST["precio"]);
    $vmodelo = filter_var ($_POST["modelo"]);
    $vtipo = filter_var ($_POST["tipo"]);
    $vedad = filter_var ($_POST["edad"]);
    $vdestinacion = filter_var ($_POST["destinacion"]);
    $vfecha = filter_var ($_POST["fecha"]);



    

    //realizar la sintaxis del insert en sql para realizar el añadido

    $insertar = $conexion->prepare("insert into propiedad (
        codigo_propiedad,	
        direccion,
        foto,	
        estado,	
        propietario,	
        metodo_pago,	
        ciudad,	
        barrio,	
        precio,	
        modelo,	
        fecha_registro,
        tipo_propiedad,	
        edad,	
        destinacion
       )
        values (:codigo,:direcci,:foto,:esta,:propie,:met_pago,:ciuda,:barri,:precio,:modelo,:fecha,:tipo,:edad,:desti)");

        //Aqui se añaden los valores de las variables al insert


        $insertar->bindParam(':codigo',$vcodigo);
        $insertar->bindParam(':direcci',$vdireccion);
        $insertar->bindParam(':foto',$vfoto);
        $insertar->bindParam(':esta',$vestado);
        $insertar->bindParam(':propie',$vpropietario);
        $insertar->bindParam(':met_pago',$vpago);
        $insertar->bindParam(':ciuda',$vciudad);
        $insertar->bindParam(':barri',$vbarrio);
        $insertar->bindParam(':precio',$vprecio);
        $insertar->bindParam(':modelo',$vmodelo);
        $insertar->bindParam(':fecha',$vfecha);
        $insertar->bindParam(':tipo',$vtipo);
        $insertar->bindParam(':edad',$vedad);
        $insertar->bindParam(':desti',$vdestinacion);
        
        $insertar->execute();

         header("location: ../read/pagina_de_propiedad.php");

} catch (PDOException $e) {
//Error;
$error= $e->getCode();

if ($error==23000){
  echo '<script>confirmar=confirm("Ese codigo de propiedad ya existe");
          if (confirmar)
            window.location.href="insertar_propiedad-forma.php";</script>';
          echo "<a href= insertar_propiedad-forma.php>Volver</a>";
}else{
  echo 'Error' . $e->getMessage();
  echo 'Error' . $e->getCode();
  echo "<a href= insertar_propiedad-forma.php> Volver</a>";
}
}

