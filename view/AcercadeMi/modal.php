<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content tx-size-sm">
            <form method="post" id="empresa_form">
                <div class="modal-header  pd-x-20">
                    <h4 class="modal-title" id="mdltitulo">Editar Contenido</h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="acer_id" name="acer_id">
                    <div class="form-layout form-layout-1">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Imagen: <span class="tx-danger">*</span></label>
                                    <input type="file" class="form-control" name="acer_image" id="acer_image" >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Texto: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="acer_mensaje" id="acer_mensaje"  cols="30" rows="10" required></textarea>
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