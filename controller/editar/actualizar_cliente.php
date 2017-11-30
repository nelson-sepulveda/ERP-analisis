<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$id_clie = $_POST['id_cliente'];
$nombre_ = $_POST['nombre_cli_up'];
$doc = $_POST['documento_cli_up'];
$tele = $_POST['telefono_cli_up'];
$email = $_POST['email_cli_up'];

update_cliente($con,$id_clie,$nombre_,$doc,$tele,$email);

?>