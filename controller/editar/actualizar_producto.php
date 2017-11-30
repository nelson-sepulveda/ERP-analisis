<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$id= $_POST['ID_produc'];
$nombre = $_post['nombre_pro_up'];
$color = $_POST['color_pro_up'];
$tela = $_POST['tela_pro_up'];

update_producto($con,$nombre,$color,$tela,$id);

?>