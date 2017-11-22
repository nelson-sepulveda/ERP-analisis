<?php

require_once('../../conexion/conexion_DB.php');
require_once('../functions.php');

$usuario = $_POST['loginUsername'];
$pass = $_POST['loginPassword'];

login_usuario($con,$usuario,$pass);
?>