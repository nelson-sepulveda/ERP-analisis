<div id="myCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Registro Cliente</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form id="registroCliente" method="post">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre_cli" id="nombre_cli" placeholder="Nombre Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>Documento</label>
            <input type="text" name="documento_cli" id="documento_cli" placeholder="Documento Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>telefono</label>
            <input type="text" name="telefono_cli" id="telefono_cli" placeholder="telefono Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>email</label>
            <input type="text" name="email_cli" id="email_cli" placeholder="email cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>contraseña</label>
            <input type="text" name="contraseña_cli" id="contraseña_cli" placeholder="contraseña cliente" class="form-control">
          </div>
          <div class="form-group">       
            <input type="submit" value="Registrar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>