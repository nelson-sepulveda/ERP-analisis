<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$nombre = $_POST['nombre_pro'];
$nit = $_POST['nit_pro'];
$direccion = $_POST['direccion_pro'];

// echo $nombre . '  -  ' . $nit . ' - ' . $direccion;

registro_proveedor($con,$nombre,$nit,$direccion);

?>