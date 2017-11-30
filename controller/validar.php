<?php 

require_once('conexion/conexion_DB.php');

$cc = $_POST['cc'];

$sql = "SELECT * FROM CLIENTE WHERE documento='$cc'";
$query = mysqli_query($con,$sql);

if($query)
{
  $row = mysqli_fetch_row($query);
  $contador = count($row);
  if($contador>=1)
  {
    echo "true";
  }
  else
  {
    echo "false";
  }

}


?>