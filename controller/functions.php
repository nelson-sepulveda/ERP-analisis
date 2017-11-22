<?php 



/**
 * Permite registrar un empleado dentro de la base de datos de Studio Prince
 * Datos: Conexion : conexion a la BD
 * Nombre : nombre del usuario
 * email : email del usuario
 * password : contraseña del usuario
 */
function insertar_registro_empleado($conexion,$nombre,$email,$password)
{

  // $sql_email = "SELECT * FROM EMPLEADO WHERE empleado.email='$email'";
  // $query_email = mysqli_query($conexion,$sql_email);
  // var_dump($query_email);

  // if(!$query_email)
  // {
      echo "a punto de registrar";

      $sql = "INSERT INTO EMPLEADO (nombre,email,pass,TIPO_EMPLEADO_ID) VALUES ('$nombre','$email','$password',2)";
    
      $query_insercion=mysqli_query($conexion,$sql); 
      if($query_insercion)
      {
        $msg[]="Se registro Correctamente el empleado";
      }
      else
      {
        $errors[]="No se registro de forma correcta el empleado" . mysqli_error($con);
      }
  
      if (isset($errors))
      {
        ?>
        <!-- <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> -->
            <?php
              foreach ($errors as $error)
              {
              }
                echo json_encode(array(
                  'registro'=>false
                ));
            ?>
        <!-- </div> -->
        <?php
      }
      
      
      else if (isset($msg)){
        ?>
        <!-- <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡Bien hecho!</strong><br> -->
            <?php
              foreach ($msg as $messages) {
              
              }
              echo json_encode(array(
                'registro'=>true
              ));
            ?>
        <!-- </div> -->
        <?php
      }
  //}// end email

  // else
  // {
    // echo json_encode(array(
    //   'registro'=>false,
    //   'emailvalido'=>false
    // ));
  //   echo "a punto de salir";
  // }
  

}


/**
 * Permite logeear a un usuario de la app - falta determinar que tipo de empleado es
 * Conexion: permite la conexion a la base de datos
 * usuario : Usuario para el login
 * password : contraseña del usuario
 */
function login_usuario($conexion, $usuario, $password)
{
  $sql_login = "SELECT * FROM EMPLEADO WHERE empleado.email='$usuario' AND empleado.pass='$password'";
  $query_login = mysqli_query($conexion,$sql_login);

  $contador = 0;  

  if($query_login)
  {
    $row = mysqli_fetch_row($query_login);
    $contador = count($row);


    if($contador>=1)
    {
      session_start();
      $_SESSION['ID']=$row[0];
      $_SESSION['email']=$row[3];
      $_SESSION['nombre']=$row[1];
      $msg[]="Ingreso correctamente";
    }

  }
  else
  {
    $errors[]="No se conecto de forma correcta a la BD" . mysqli_error($con);
  }

  if (isset($errors))
  {
        echo json_encode(array(
          'login'=>false
        ));
  }
  
  
  else if (isset($msg)){
      echo json_encode(array(
        'login'=>true
      ));
  }
}


?>