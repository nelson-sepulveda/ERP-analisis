<?php 

 require_once('conexion/conexion_DB.php');

 $sql_get_proveedores = "SELECT * FROM PROVEEDOR"; 
 $query_proveedor = mysqli_query($con,$sql_get_proveedores); 

 if($query_proveedor)
 {
   ?>
     <select id="provee" name="account" class="form-control">
   <?php
    while($row= mysqli_fetch_row($query_proveedor))
    {
      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
    }
   ?>
     </select>
   <?php
 }
 else
 {
   ?>
      <h4>No se encuentrar proveedores!</h4>  
   <?php
 }

?>