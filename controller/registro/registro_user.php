<?php 

  require_once('../../conexion/conexion_DB.php');
  require_once('../functions.php');

  $user_name = $_POST['registerUsername'];
  $email = $_POST['registerEmail'];
  $pass = $_POST['registerPassword'];
  
  insertar_registro_empleado($con,$user_name,$email,$pass);
?>