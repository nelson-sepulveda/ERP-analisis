<div id="update_producto_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Editar Producto</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p></p>
        <form id="updateProducto">
        <input type="hidden" id="ID_produc" name="ID_produc">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" id="nombre_pro_up" name="nombre_pro_up" placeholder="Nombre Producto" class="form-control">
          </div>
          <div class="form-group">
            <label>Color</label>
            <input type="text" id="color_pro_up"name="color_pro_up" placeholder="Color" class="form-control">
          </div>
          <div class="form-group">       
            <label>Tela</label>
            <input type="text" id="tela_pro_up" name="tela_pro_up" placeholder="Tela" class="form-control">
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
</div>