<?php 
/**
 * Archivo que contiene todos las funciones a implementar en el ERP
 * 
 */


/**
 * Funciones de registro
 */


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
        
            <?php
              
                echo json_encode(array(
                  'registro'=>false
                ));
            ?>
        <?php
      }
      
      
      else if (isset($msg)){
       
              echo json_encode(array(
                'registro'=>true
              ));
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
      echo "true";
    }
    else
    {
      echo "false";
    }

  }
  else
  {
    $errors[]="No se conecto de forma correcta a la BD" . mysqli_error($con);
  }

  if(isset($errors))
  {
      echo "false";
        // echo json_encode(array(
        // 'login'=>false
        // ));
  }
  
  
  else if (isset($msg)){
     echo "true";
      // echo json_encode(array(
      //   'login'=>true
      // ));
  }
}


/**
 * Funcion que permite registrar proveedores
 * 
 */
function registro_proveedor($conexion,$nombre,$nit,$direccion)
{
  $sql_registro_proveedor = "INSERT INTO PROVEEDOR (NOMBRE,NIT,DIRECCION) VALUES('$nombre','$nit','$direccion')";

  $query_registro_proveedor = mysqli_query($conexion,$sql_registro_proveedor);

  if($query_registro_proveedor)
  {
    echo "true";
  }
  else
  {
    $errors[]="No se registro de forma correcta el empleado" . mysqli_error($con);
    echo "false";
  }
}

/**
 * Permite registrar un producto
 * Sus atributos son:
 *  nombre del producto
 * Color del producto
 * Tela del producto
 * ID del proveedor
 */
function registrar_producto($conexion,$nombre,$color,$tela,$proveedor)
{
  $sql_producto = "INSERT INTO PRODUCTO (nombre,ID_tipo,color,tela,proveedor) VALUES ('$nombre',1,'$color','$tela','$proveedor')";

  $query_producto_insert = mysqli_query($conexion,$sql_producto);
  if($query_producto_insert)
  {
    echo "true";
  }
}


/**
 * Funcion que permite registrar un cliente en la BD
 * Parametros obligatorios : nombre, email y contrasena
 * 
 */
function registro_cliente($conexion,$nombre,$documento,$telefono,$email,$contrasena)
{
   $sql_cliente = "INSERT INTO CLIENTE (NOMBRE,DOCUMENTO,TELEFONO,EMAIL,PASS,tipo_cliente_id) VALUES ('$nombre','$documento','$telefono','$email','$contrasena',1)";

   $query_cliente = mysqli_query($conexion,$sql_cliente);

   if($query_cliente)
   {
     echo "true";
   }
   else
   {
    $errors[]="No se registro de forma correcta el empleado" . mysqli_error($con);
    echo "false";
   }
}















function get_proveedores($con)
{
  $sql_dar_proveedores = "SELECT * FROM PROVEEDOR";
  $query_proveedor = mysqli_query($con,$sql_dar_proveedores);

//   <table class="table">
//   <thead>
//     <tr>
//       <th>#</th>
//       <th>First Name</th>
//       <th>Last Name</th>
//       <th>Username</th>
//     </tr>
//   </thead>
//   <tbody>
//     <tr>
//       <th scope="row">1</th>
//       <td>Mark</td>
//       <td>Otto</td>
//       <td>@mdo</td>
//     </tr>
//     <tr>
//       <th scope="row">2</th>
//       <td>Jacob</td>
//       <td>Thornton</td>
//       <td>@fat</td>
//     </tr>
//     <tr>
//       <th scope="row">3</th>
//       <td>Larry</td>
//       <td>the Bird</td>
//       <td>@twitter</td>
//     </tr>
//   </tbody>
// </table>



  if($query_proveedor)
  {
     ?>
      <table class="table">
       <thead>
        <tr>
          <th>Nombre </th>
          <th>NIT</th>
          <th>Direccion</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
     <tbody>
     <?php 
        while($row=mysqli_fetch_row($query_proveedor)){
      ?>
      <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td>
           <button type="button" id="btnEditar" data-toggle="modal" data-target="#update_proveedor" class="btn btn-primary" data-id="<?php echo $row[0];?>" data-nombre="<?php echo $row[1]; ?>" data-nit="<?php echo $row[2]; ?>" data-direccion="<?php echo $row[3]; ?>">Editar</button> 
        </td>
        <td><button type="button" id="btnEliminar" data-toggle="modal" data-target="#update_proveedor" class="btn btn-cancel" data-id="<?php echo $row[0];?>">Eliminar</button> </td>
      </tr>
     <?php 
        } // end while
     ?>
     </tbody>
    </table>
     <?php
  }

}


?>