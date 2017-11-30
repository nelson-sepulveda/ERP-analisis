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
  else
  {
    echo "false";
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




/**
 * 
 * 
 * 
 * 
 */

/**
 * 
 * Permite editar un producto dentro la base de datos - mirar
 */

function get_producto($con)
{
  $sql_dar_producto = "SELECT * FROM PRODUCTO";
  $query_ = mysqli_query($con,$sql_dar_producto);

  if($query_)
  {
     ?>
      <table class="table">
       <thead>
        <tr>
          <th>Codigo </th>
          <th>Nombre</th>
          <th>Color</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
     <tbody>
     <?php 
        while($row=mysqli_fetch_row($query_)){
      ?>
      <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[5]; ?></td>
        <td>
           <button type="button" id="btnEdit" data-toggle="modal" data-target="#update_producto_modal" class="btn btn-primary" data-id="<?php echo $row[0];?>" data-nombre="<?php echo $row[2]; ?>" data-color="<?php echo $row[5]; ?>" data-tela="<?php echo $row[6]; ?>">Editar</button> 
        </td>
        <td><button type="button" id="btnEliminar" data-toggle="modal" data-target="#eliminarProducto" class="btn btn-cancel" data-id="<?php echo $row[0];?>">Eliminar</button> </td>
      </tr>
     <?php 
        } // end while
     ?>
     </tbody>
    </table>
     <?php
  }

}



/**
 * Permmite obtener todos los proveedores en una tabla para su mayor comodidad
 * 
 */


function get_proveedores($con)
{
  $sql_dar_proveedores = "SELECT * FROM PROVEEDOR";
  $query_proveedor = mysqli_query($con,$sql_dar_proveedores);

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
           <button type="button" id="btnEditar" data-toggle="modal" data-target="#update_proveedor_modal" class="btn btn-primary" data-id="<?php echo $row[0];?>" data-nombre="<?php echo $row[1]; ?>" data-nit="<?php echo $row[2]; ?>" data-direccion="<?php echo $row[3]; ?>">Editar</button> 
        </td>
        <td><button type="button" id="btnEliminar" data-toggle="modal" data-target="#eliminarProveedor" class="btn btn-cancel" data-id="<?php echo $row[0];?>">Eliminar</button> </td>
      </tr>
     <?php 
        } // end while
     ?>
     </tbody>
    </table>
     <?php
  }

}


/**
 * Metodo que permite mostrar todos los clientes en la app
 * 
 */

function get_clientes($con)
{
  $sql_dar_clientes = "SELECT * FROM cliente";
  $query_cliente = mysqli_query($con,$sql_dar_clientes);

  if($query_cliente)
  {
     ?>
      <table class="table">
       <thead>
        <tr>
          <th>Nombre </th>
          <th>email</th>
          <th>Telefono</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
     <tbody>
     <?php 
        while($row=mysqli_fetch_row($query_cliente)){
      ?>
      <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td>
           <button type="button" id="btnEdi" data-toggle="modal" data-target="#update_cliente_modal" class="btn btn-primary" data-id="<?php echo $row[0];?>" data-doc="<?php echo $row[2]; ?>" data-nombre="<?php echo $row[1]; ?>" data-telefono="<?php echo $row[3]; ?>" data-email="<?php echo $row[4]; ?>">Editar</button> 
        </td>
        <td><button type="button" id="btnEliminar" data-toggle="modal" data-target="#eliminarCliente" class="btn btn-cancel" data-id="<?php echo $row[0];?>">Eliminar</button> </td>
      </tr>
     <?php 
        } // end while
     ?>
     </tbody>
    </table>
     <?php
  }

}

/**
 * Actualizar el proveedor
 * Permite actualizar un proveedor de la base de datos con los datos respectivos
 */
function update_proveedor($con,$id,$nombre,$nit,$direccion)
{
    $sql_update_proveedor = "UPDATE PROVEEDOR SET nombre='$nombre',NIT='$nit',direccion='$direccion' WHERE ID='$id'";
    $query_update = mysqli_query($con,$sql_update_proveedor);

    if($query_update)
    {
      echo "true";
    }
    else{
      echo "false";
    }

}


/**
 * Permite actualizar un producto dentro de la base de datos
 * 
 */

 function update_producto($con,$nombre,$color,$tela,$id)
 {
  $sql_update_producto = "UPDATE PRODUCTO SET nombre='$nombre',color='$color',tela='$tela' WHERE ID='$id'";
  $query_update = mysqli_query($con,$sql_update_producto);

  if($query_update)
  {
    echo "true";
  }
  else{
    echo "false";
  }
 }


/**
 * Permte actualizar el registro de un cliente
 * 
 */
function update_cliente($con,$id_clie,$nombre_,$doc,$tele,$email)
{
  $sql_update_cliente = "UPDATE CLIENTE SET nombre='$nombre_',documento='$doc',telefono='$tele',email='$email' WHERE ID='$id_clie'";
  $query_update = mysqli_query($con,$sql_update_cliente);

  if($query_update)
  {
    echo "true";
  }
  else{
    echo "false";
  }
}





?>