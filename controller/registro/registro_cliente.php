<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$nombre = $_POST['nombre_cli'];
$documento = $_POST['documento_cli'] ;
$telefono = $_POST['telefono_cli'];
$email = $_POST['email_cli'] ;
$contrasena = $_POST['contraseña_cli'] ;

registro_cliente($con,$nombre,$documento,$telefono,$email,$contrasena);




?>