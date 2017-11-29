<div id="update_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Editar Proveedor</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p></p>
        <form id="updateProveedor">
        <input type="hidden" id="ID_provee">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" id="nombre_up" name="nombre_up" placeholder="Nombre Proveedor" class="form-control">
          </div>
          <div class="form-group">
            <label>NIT</label>
            <input type="text" id="nit_up"name="nit_up" placeholder="NIT" class="form-control">
          </div>
          <div class="form-group">       
            <label>Direccion</label>
            <input type="text" id="direccion_up" name="direccion_up" placeholder="Direccion" class="form-control">
          </div>
          <div class="form-group">       
            <input type="submit" value="Editar" class="btn btn-primary">
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div><div id="myProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Registro Proveedor</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p></p>
        <form id="registroProveedor">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" id="nombre_pro" name="nombre_pro" placeholder="Nombre Proveedor" class="form-control">
          </div>
          <div class="form-group">
            <label>NIT</label>
            <input type="text" id="nit_pro"name="nit_pro" placeholder="NIT" class="form-control">
          </div>
          <div class="form-group">       
            <label>Direccion</label>
            <input type="text" id="direccion_pro" name="direccion_pro" placeholder="Direccion" class="form-control">
          </div>
          <div class="form-group">       
            <input type="submit" value="Registrar" class="btn btn-primary">
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>