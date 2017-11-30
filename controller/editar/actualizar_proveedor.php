<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$id = $_POST['ID_provee'];
$nombre = $_POST['nombre_up'];
$nit = $_POST['nit_up'];
$direccion = $_POST['direccion_up'];

update_proveedor($con,$id,$nombre,$nit,$direccion);

?>