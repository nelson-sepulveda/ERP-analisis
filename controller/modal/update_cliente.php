<div id="update_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Registro Cliente</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form id="updateCliente" method="post">
        <input type="hidden" id="id_cliente" name="id_cliente">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre_cli_up" id="nombre_cli_up" placeholder="Nombre Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>Documento</label>
            <input type="text" name="documento_cli_up" id="documento_cli_up" placeholder="Documento Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>telefono</label>
            <input type="text" name="telefono_cli_up" id="telefono_cli_up" placeholder="telefono Cliente" class="form-control">
          </div>
          <div class="form-group">
            <label>email</label>
            <input type="text" name="email_cli_up" id="email_cli_up" placeholder="email cliente_up" class="form-control">
          </div>
          <div class="form-group">       
            <input type="submit" value="Editar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>