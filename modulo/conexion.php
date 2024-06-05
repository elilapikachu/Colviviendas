<?php
try {
    //Interfaz de conexion
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=colviviendas;', 'root', '');

} catch (PDOException $e) {
    //Casa de que ocurra algun error
    echo "Fallo la conexion " . $e->getMessage();
}
