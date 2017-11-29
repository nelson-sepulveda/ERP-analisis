<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tela = $_POST['tela'];
    $proveedor = $_POST['proveedor'];

    registrar_producto($con,$nombre,$color,$tela,$proveedor);

?>