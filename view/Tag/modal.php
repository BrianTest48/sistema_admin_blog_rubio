<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content tx-size-xl">
            <form method="post" id="tag_form">
                <div class="modal-header  pd-x-20">
                    <h4 class="modal-title" id="mdltitulo">Editar Contenido</h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="tag_id" name="tag_id">
                    <div class="form-layout form-layout-1">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Nombre del Tag: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="tag_nombre" id="tag_nombre" >
                                </div>
                            </div><!-- col-4 -->
                            
                        </div><!-- row -->
                    </div>
                    <div class="modal-footer" id="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" id="btnclosemodal">Cerrar</button>
                        <button type="submit" name="action" id="btnagregar" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>